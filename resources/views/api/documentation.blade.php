<link rel="stylesheet" href="{{ URL::to('backEnd/assets/styles/blueprint.css') }}" type="text/css"/>
<div class="container">
   <h3 class="center alt">&ldquo;Aaraa Admin Dashboard with APIs &rdquo; Documentation by
      &ldquo;Vavisa IT Solutions&rdquo;
      v1.0
   </h3>
   <hr>
   <h1 class="center">&ldquo;Aaraa APIs Documentation&rdquo;</h1>
   <p>
      Available APIs is for mobile application to retrieve the contents for polls, categories, add comments, send notifications and more.
   </p>
   <h2 id="toc" class="alt">Table of Contents</h2>
   <ol class="alpha">
      <li> Restful Web Services
         <ol>
            <li>{ GET } &nbsp; &nbsp; <a href="#profile">/api/users/profile</a></li>
            <li>{ GET } &nbsp; &nbsp; <a href="#favourites">/api/users/favourites</a></li>
            <li>{ GET } &nbsp; &nbsp; <a href="#mypolls">/api/users/mypolls</a></li>
            <li>{ GET } &nbsp; &nbsp; <a href="#polls">/api/polls</a></li>
            <li>{ GET } &nbsp; &nbsp; <a href="#categories">/api/categories</a></li>
            <li>{ GET } &nbsp; &nbsp; <a href="#config">/api/config</a></li>
            <li>{ GET } &nbsp; &nbsp; <a href="#durations">/api/durations</a></li>
            <li>{ GET } &nbsp; &nbsp; <a href="#countries">/api/countries</a></li>
            <li>{ GET } &nbsp; &nbsp; <a href="#poll_results_id">/api/poll/results/{id}</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#register">/api/users/register</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#login">/api/users/login</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#logout">/api/users/logout</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#profile_edit">/api/users/profile/edit</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#password">/api/users/password</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#favourite_id">/api/users/favourite/{id}</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#polls_category_id">/api/polls</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#polls_create">/api/polls/create</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#polls_delete_id">/api/polls/delete/{id}</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#polls_comment">/api/polls/comment</a></li>
            <li>{ POST } &nbsp; &nbsp; <a href="#polls_comments_id">/api/polls/comments/{id}</a></li>
         </ol>
      </li>
   </ol>
   <hr>
   <h3>A) Restful Web Services</h3>
   <hr>
   <h3 id="register"><strong>/api/users/register</strong> - <a href="#toc">top</a></h3>
   <p> API to register new user in the application.
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>POST</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/register</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               <strong>name</strong> : Username
               <br>
               <strong>email</strong> : User email address
               <br>
               <strong>password</strong> : Password
               <br>
               <strong>age</strong> : Age
               <br>
               <strong>terms_conditions</strong> : Accept Terms and Conditions
               <br>
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
    "success": "User successfully regirsted!",
}</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <h3 id="login"><strong>/api/users/login</strong> - <a href="#toc">top</a></h3>
   <p> API to login to the application and get access token.
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>POST</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/login</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               <strong>email</strong> : User email address
               <br>
               <strong>password</strong> : Password
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "success": {
         "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjhjZjA0ZTNkMTM
         0MjJlMGIwMTJjMDBmYjYzYTI2NDQ0MjM2Yjc1YWRhNjdkYzliZTM1ZDE2NWM0OGM2Zjk4
         oiOGNmMDRlM2QxMzJhYTNiODhhOTM3MDczZjYzMTQyMmUwY",
         "status": 200
   }
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <h3 id="logout"><strong>/api/users/logout</strong> - <a href="#toc">top</a></h3>
   <p> API to logout from the application.
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>POST</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/logout</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "success": "User successfully logged out!"
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <hr>
   <h3 id="profile"><strong>/api/users/profile</strong> - <a href="#toc">top</a></h3>
   <p> API to get the user profile.
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>GET</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/profile</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "success": {
      "id": "031d14b4-e222-4bde-a770-b44fcaeba49f",
      "name": "Vavisa IT Solutions",
      "email": "info@vavisa-kw.com",
      "password": "$2y$10$jQg45nn0SAHlFQsAanw/bOQWak/yIHvUO41ShjS41/AXqiTG35tEG",
      "photo": "",
      "age": 27,
      "terms_conditions": 1,
      "notification": 1,
      "preferred_language": "en",
      "status": 1,
      "remember_token": null,
      "created_by": null,
      "updated_by": "031d14b4-e222-4bde-a770-b44fcaeba49f",
      "created_at": "2019-06-13 12:30:38",
      "updated_at": "2019-06-16 08:34:53"
   }
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <hr>
   <h3 id="profile_edit"><strong>/api/users/profile/edit</strong> - <a href="#toc">top</a></h3>
   <p> API to edit the user profile.
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>POST</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/profile/edit</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               <strong>name</strong> : Name (required)
               <br>
               <strong>photo</strong> : Photo
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "success": "Profile successfully updated!"
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <hr>
   <h3 id="password"><strong>/api/users/password</strong> - <a href="#toc">top</a></h3>
   <p> API to change the user account password
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>POST</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/password</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               <strong>Old Password</strong> : Existing Password
               <br>
               <strong>New Password</strong> : New Password
               <br>
               <strong>Confirm Password</strong> : Confirm Password
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "success": "Password updated successfully."
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
            <pre>{
   "error": "Both new and confirm password should be same."
}
</pre>
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <hr>
   <h3 id="favourites"><strong>/api/users/favourites</strong> - <a href="#toc">top</a></h3>
   <p> API to get the user saved polls.
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>GET</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/favourites</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "id": "1",
   "poll_title_ar": null,
   "poll_title_en": "Who is the best football player in the world?",
   "photo": null,
   "status": 1,
   "start_datetime": "2019-06-11 23:36:00",
   "end_datetime": "2019-06-11 23:36:00",
   "enable_comments": 1,
   "seo_title_ar": null,
   "seo_title_en": "football-player",
   "created_by": "031d14b4-e222-4bde-a770-b44fcaeba49f",
   "updated_by": "031d14b4-e222-4bde-a770-b44fcaeba49f",
   "created_at": "2019-06-11 23:36:00",
   "updated_at": "2019-06-11 23:36:00",
   "pivot": {
         "application_users_id": "031d14b4-e222-4bde-a770-b44fcaeba49f",
         "poll_id": "1"
   }
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
            <pre>{
   "error": "No saved polls available."
}
</pre>
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <hr>
   <h3 id="favourite_id"><strong>/api/users/favourite/{id}</strong> - <a href="#toc">top</a></h3>
   <p> API to save the poll.
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>POST</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/favourite/{id}</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               <strong>poll_id</strong> : Poll ID
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "success": "Poll mark as favourite.",
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <hr>
   <h3 id="mypolls"><strong>/api/users/mypolls</strong> - <a href="#toc">top</a></h3>
   <p> API to get the polls specific to the users.
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>GET</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/mypolls</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "id": "1",
   "poll_title_ar": null,
   "poll_title_en": "Who is the best football player in the world?",
   "photo": null,
   "status": 1,
   "start_datetime": "2019-06-11 23:36:00",
   "end_datetime": "2019-06-11 23:36:00",
   "enable_comments": 1,
   "seo_title_ar": null,
   "seo_title_en": "football-player",
   "created_by": "031d14b4-e222-4bde-a770-b44fcaeba49f",
   "updated_by": "031d14b4-e222-4bde-a770-b44fcaeba49f",
   "created_at": "2019-06-11 23:36:00",
   "updated_at": "2019-06-11 23:36:00"
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <h3 id="polls"><strong>/api/polls</strong> - <a href="#toc">top</a></h3>
   <p> API to get the polls based on the user current location (based on IP address).
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>GET</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/polls</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "id": "1",
   "poll_title_ar": null,
   "poll_title_en": "Who is the best football player in the world?",
   "photo": null,
   "status": 1,
   "start_datetime": "2019-06-11 23:36:00",
   "end_datetime": "2019-06-11 23:36:00",
   "enable_comments": 1,
   "seo_title_ar": null,
   "seo_title_en": "football-player",
   "created_by": "031d14b4-e222-4bde-a770-b44fcaeba49f",
   "updated_by": "031d14b4-e222-4bde-a770-b44fcaeba49f",
   "created_at": "2019-06-11 23:36:00",
   "updated_at": "2019-06-11 23:36:00"
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <hr>
   <h3 id="polls_category_id"><strong>/api/polls</strong> - <a href="#toc">top</a></h3>
   <p> API to get the polls based on Category ID
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>POST</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/users/polls</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               <strong>category_id</strong> : Category ID
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>C
            <td>
               <pre>{
   "id": "1",
   "poll_title_ar": null,
   "poll_title_en": "Who is the best football player in the world?",
   "photo": null,
   "status": 1,
   "start_datetime": "2019-06-11 23:36:00",
   "end_datetime": "2019-06-11 23:36:00",
   "enable_comments": 1,
   "seo_title_ar": null,
   "seo_title_en": "football-player",
   "created_by": "031d14b4-e222-4bde-a770-b44fcaeba49f",
   "updated_by": "031d14b4-e222-4bde-a770-b44fcaeba49f",
   "created_at": "2019-06-11 23:36:00",
   "updated_at": "2019-06-11 23:36:00"
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               <pre>{
   "error": "Category Id is missing."
}
</pre>
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <hr>
   <h3 id="polls_create"><strong>/api/polls/create</strong> - <a href="#toc">top</a></h3>
   <p>
      Create poll
   <table class="table">
      <tbody>
         <tr>
            <th>Method</th>
            <td>POST</td>
            <td>
               Request type
            </td>
         </tr>
         <tr>
            <th>URL</th>
            <td>
               <small>
               http://YOUR_WEBSITE_URL
               </small>
               <strong>/api/polls/create</strong>
            </td>
            <td>
               URL structure
            </td>
         </tr>
         <tr>
            <th>URL Params</th>
            <td>
               <strong>poll_name</strong> : Poll Name (required)
               <br>
               <strong>category_id</strong> : Category ID (required)
               <br>
               <strong>options</strong> : Options (Array) (required)
               <br>
               <strong>photo</strong> : Photo
               <br>
               <strong>countries</strong> : Countries (Array) (optional)
            </td>
            <td>
               -
            </td>
         </tr>
         <tr>
            <th>Success Response</th>
            <td>
               <pre>{
   "success": "Poll submitted successfully!"
}
</pre>
            </td>
            <td>
               <div>
                  Response Status Code : 200
               </div>
            </td>
         </tr>
         <tr>
            <th>Error Response</th>
            <td>
               -
            </td>
            <td>
               -
            </td>
         </tr>
      </tbody>
   </table>
   </p>
   <hr>
   <p class="append-bottom alt large"><strong>Vavisa IT Solutions</strong></p>
   <p><a href="#toc">Go To Table of Contents</a></p>
   <hr class="space">
</div>
<!-- end div .container -->