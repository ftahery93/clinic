<script type="text/javascript">
    var public_lang = "{{ trans('backend.calendarLanguage') }}"; // this is a public var used in app.html.js to define path to js files
    var public_folder_path = "{{ URL::to('') }}"; // this is a public var used in app.html.js to define path to js files
</script>
<script src="{{ URL::to('backEnd/scripts/app.html.js') }}"></script>