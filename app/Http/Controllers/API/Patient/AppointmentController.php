<?php

namespace App\Http\Controllers\API\Patient;

use App\Appointment;
use App\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Issue;
use App\Utility;
use Carbon\Carbon;
use App\LanguageManagement;
use App\Patient;
use App\PatientAppointment;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    public $utility;
    public function __construct(Request $request)
    {
        $this->utility = new Utility();
    }


    public function getDoctorAppointments(Request $request, $id)
    {
        $appointmentWindows = Appointment::where('doctor_id', $id)->get();
        return response()->json([
            'appointments' => $appointmentWindows
        ]);
    }

    public function bookAppointment(Request $request)
    {
        $validator = [
            'appointment' => 'required',
            'appointment.doctor_id' => 'required|exists:doctor,id',
            'appointment.id' => 'required',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $appointment = $request->appointment;
        $appointmentWindow = Appointment::find($appointment['id']);
        $startTime = Carbon::parse($appointmentWindow->start_time);

        $patientAppointment = PatientAppointment::create([
            'patient_id' => $request->user_id,
            'start_time' =>  $startTime,
            'doctor_id' => $appointment['doctor_id']
        ]);
        $endTime = $startTime->addMinutes(15);
        $patientAppointment->update([
            'end_time' => $endTime
        ]);

        $appointmentWindow->update([
            'start_time' => $endTime
        ]);
        return response()->json([
            'message' => LanguageManagement::getLabel('appointment_booked', 'en'),
        ]);
    }

    public function getMyAppointments(Request $request)
    {
        $appointments = PatientAppointment::where('patient_id', $request->user_id)->get();
        $past = [];
        $upcoming = [];
        foreach ($appointments as $appointment) {
            if (Carbon::parse($appointment->start_time)->gt(Carbon::now())) {
                $upcoming[] = $appointment;
            } else {
                $past[] = $appointment;
            }
        }
        return response()->json([
            'past' => $past,
            'upcoming' => $upcoming
        ]);
    }

    public function cancelAppointment(Request $request, $id)
    {
        $patientAppointment = PatientAppointment::find($id);
        $patientAppointment->delete();
        return response()->json([
            'message' => LanguageManagement::getLabel('appointmnet_delete', 'en'),
        ]);
    }

    public function getDoctors()
    {
        $doctors = Doctor::where('status', 1)->get();
        return response()->json([
            'doctors' => $doctors
        ]);
    }

    public function emailUpdate(Request $request, $id)
    {
        $patient = Patient::find($id);
        $upcomingAppointments = PatientAppointment::where('patient_id', $patient->id)->get();
        foreach ($upcomingAppointments as $upcomingAppointment) {
            //$interval[$count] = abs(strtotime($date) - strtotime($day));
            $interval[] = abs(strtotime(Carbon::now()) - strtotime($upcomingAppointment->start_time));
            //$count++;
        }

        asort($interval);
        $closest = $interval[0];
        echo $closest;
        die;


        // asort($interval);
        // $closest = key($interval);

        // $data=[
        //     ''
        // ]
        // Mail::send(,);

        // Mail::send($template,  $data, function ($message) use ($data) {
        //     $message->to($data['email'], $data['fullname'])->subject($data['subject']);
        //     $message->from($data['MAIL_FROM_ADDRESS'], $data['APP_NAME']);
        // });

    }















    public function getIssueDetails(Request $request, $id)
    {
        $issue = Issue::find($id);
        return response()->json($issue);
    }

    public function approveIssue(Request $request)
    {
        $validator = [
            'issue' => 'required',
            'issue.id' => 'required|exists:issue,id',
            'issue.file' => 'required',
        ];
        $checkForError = $this->utility->checkForErrorMessages($request, $validator, 422);
        if ($checkForError) {
            return $checkForError;
        }

        $issue = $request->issue;
        $approvingIssue = Issue::find($issue['id']);

        // if ($request->hasFile('file')) {
        //     $icon = $request->file('file');
        //     $filename = time() . '.' . $icon->getClientOriginalExtension();
        //     $destinationPath = public_path('approved_issue_images/');
        //     $icon->move($destinationPath, $filename);
        //     $request['image'] = $filename;
        // }

        $file_data = $issue['file'];
        $file_name = 'approved_issue_image' . time() . '.png';

        if ($file_data != null) {
            Storage::disk('public')->put('approved_issue_images/' . $file_name, base64_decode($file_data));
        }

        $approvingIssue->update([
            'approved_image' => $file_name,
            'approved_date' => Carbon::now(),
            'employee_id' => $request->employee_id,
            'status' => 2
        ]);

        if ($approvingIssue->mobile) {
            $basic  = new \Nexmo\Client\Credentials\Basic('e5774e87', 'iDPhTRJRo362wcDo');
            $client = new \Nexmo\Client($basic);
            $message = $client->message()->send([
                'to' => '965' . $approvingIssue->mobile,
                'from' => 'Team-404',
                'text' => 'The issue that you reported is resolved. Thanks for reporting.'
            ]);
        }


        return response()->json([
            'message' => LanguageManagement::getLabel('report_approve_success', "en"),
        ]);
    }
}
