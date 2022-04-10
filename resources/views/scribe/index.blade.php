<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Social-Network-API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "https://socialnet-api.herokuapp.com/";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.26.0.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.26.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authentication">
                    <a href="#authentication">Authentication</a>
                </li>
                                    <ul id="tocify-subheader-authentication" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-register">
                        <a href="#authentication-POSTapi-auth-register">Register new user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-POSTapi-auth-login">
                        <a href="#authentication-POSTapi-auth-login">Login user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-GETapi-auth-logout">
                        <a href="#authentication-GETapi-auth-logout">Logout current auth user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="authentication-GETapi-auth-me">
                        <a href="#authentication-GETapi-auth-me">Get info about current auth user.</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="follow">
                    <a href="#follow">Follow</a>
                </li>
                                    <ul id="tocify-subheader-follow" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="follow-GETapi-followers">
                        <a href="#follow-GETapi-followers">Return list of authenticated user followers</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="follow-GETapi-following">
                        <a href="#follow-GETapi-following">Return list of users, which authenticated user following</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="follow-POSTapi-follow--id-">
                        <a href="#follow-POSTapi-follow--id-">Endpoint for follow user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="follow-DELETEapi-follow--id-">
                        <a href="#follow-DELETEapi-follow--id-">Endpoint for unfollow user</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="users">
                    <a href="#users">Users</a>
                </li>
                                    <ul id="tocify-subheader-users" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="users-GETapi-users">
                        <a href="#users-GETapi-users">All users list</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="users-GETapi-users--id-">
                        <a href="#users-GETapi-users--id-">Get user by id</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: April 10 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>Social Network API for Front-end learning projects</p>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">https://socialnet-api.herokuapp.com/</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>To authenticate requests, include an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="authentication">Authentication</h1>

    <p>API endpoints for app auth.</p>

            <h2 id="authentication-POSTapi-auth-register">Register new user</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://socialnet-api.herokuapp.com/api/auth/register" \
    --header "Content-Type: multipart/form-data" \
    --header "Accept: application/json" \
    --form "first_name=aut" \
    --form "last_name=aperiam" \
    --form "username=rem" \
    --form "email=aut" \
    --form "password=molestias" \
    --form "password_confirmation=occaecati" \
    --form "profile_background=@/private/var/folders/84/w3n_xjhs3jd5njx21_3s09r40000gn/T/php3VnnU4" \
    --form "avatar=@/private/var/folders/84/w3n_xjhs3jd5njx21_3s09r40000gn/T/phpwgRZYr" </code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/auth/register"
);

const headers = {
    "Content-Type": "multipart/form-data",
    "Accept": "application/json",
};

const body = new FormData();
body.append('first_name', 'aut');
body.append('last_name', 'aperiam');
body.append('username', 'rem');
body.append('email', 'aut');
body.append('password', 'molestias');
body.append('password_confirmation', 'occaecati');
body.append('profile_background', document.querySelector('input[name="profile_background"]').files[0]);
body.append('avatar', document.querySelector('input[name="avatar"]').files[0]);

fetch(url, {
    method: "POST",
    headers,
    body,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-register">
            <blockquote>
            <p>Example response (201, Successfully):</p>
        </blockquote>
                <pre>

<code class="language-json">registered {
 &quot;token&quot;: $10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-register"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-register"></code></pre>
</span>
<form id="form-POSTapi-auth-register" data-method="POST"
      data-path="api/auth/register"
      data-authed="0"
      data-hasfiles="1"
      data-isarraybody="0"
      data-headers='{"Content-Type":"multipart\/form-data","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-register"
                    onclick="tryItOut('POSTapi-auth-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-register"
                    onclick="cancelTryOut('POSTapi-auth-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/register</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>first_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="first_name"
               data-endpoint="POSTapi-auth-register"
               value="aut"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>last_name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="last_name"
               data-endpoint="POSTapi-auth-register"
               value="aperiam"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="username"
               data-endpoint="POSTapi-auth-register"
               value="rem"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-auth-register"
               value="aut"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-register"
               value="molestias"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>password_confirmation</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password_confirmation"
               data-endpoint="POSTapi-auth-register"
               value="occaecati"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>profile_background</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="profile_background"
               data-endpoint="POSTapi-auth-register"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>avatar</code></b>&nbsp;&nbsp;<small>file</small>     <i>optional</i> &nbsp;
                <input type="file"
               name="avatar"
               data-endpoint="POSTapi-auth-register"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="authentication-POSTapi-auth-login">Login user</h2>

<p>
</p>



<span id="example-requests-POSTapi-auth-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://socialnet-api.herokuapp.com/api/auth/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"username\": \"quibusdam\",
    \"password\": \"expedita\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/auth/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "username": "quibusdam",
    "password": "expedita"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-auth-login">
            <blockquote>
            <p>Example response (200, Successfully):</p>
        </blockquote>
                <pre>

<code class="language-json">logged in {
 &quot;token&quot;: $10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-auth-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-auth-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-auth-login"></code></pre>
</span>
<span id="execution-error-POSTapi-auth-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-auth-login"></code></pre>
</span>
<form id="form-POSTapi-auth-login" data-method="POST"
      data-path="api/auth/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-auth-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-auth-login"
                    onclick="tryItOut('POSTapi-auth-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-auth-login"
                    onclick="cancelTryOut('POSTapi-auth-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-auth-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/auth/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>username</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="username"
               data-endpoint="POSTapi-auth-login"
               value="quibusdam"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-auth-login"
               value="expedita"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="authentication-GETapi-auth-logout">Logout current auth user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-auth-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://socialnet-api.herokuapp.com/api/auth/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/auth/logout"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-logout">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-logout"></code></pre>
</span>
<span id="execution-error-GETapi-auth-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-logout"></code></pre>
</span>
<form id="form-GETapi-auth-logout" data-method="GET"
      data-path="api/auth/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-logout"
                    onclick="tryItOut('GETapi-auth-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-logout"
                    onclick="cancelTryOut('GETapi-auth-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/logout</code></b>
        </p>
                <p>
            <label id="auth-GETapi-auth-logout" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-auth-logout"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="authentication-GETapi-auth-me">Get info about current auth user.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-auth-me">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://socialnet-api.herokuapp.com/api/auth/me" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/auth/me"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-auth-me">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-auth-me" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-auth-me"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-auth-me"></code></pre>
</span>
<span id="execution-error-GETapi-auth-me" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-auth-me"></code></pre>
</span>
<form id="form-GETapi-auth-me" data-method="GET"
      data-path="api/auth/me"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-auth-me', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-auth-me"
                    onclick="tryItOut('GETapi-auth-me');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-auth-me"
                    onclick="cancelTryOut('GETapi-auth-me');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-auth-me" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/auth/me</code></b>
        </p>
                <p>
            <label id="auth-GETapi-auth-me" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-auth-me"
                                                                data-component="header"></label>
        </p>
                </form>

        <h1 id="follow">Follow</h1>

    <p>API endpoints for all followers functional</p>

            <h2 id="follow-GETapi-followers">Return list of authenticated user followers</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-followers">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://socialnet-api.herokuapp.com/api/followers" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/followers"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-followers">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-followers" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-followers"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-followers"></code></pre>
</span>
<span id="execution-error-GETapi-followers" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-followers"></code></pre>
</span>
<form id="form-GETapi-followers" data-method="GET"
      data-path="api/followers"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-followers', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-followers"
                    onclick="tryItOut('GETapi-followers');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-followers"
                    onclick="cancelTryOut('GETapi-followers');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-followers" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/followers</code></b>
        </p>
                <p>
            <label id="auth-GETapi-followers" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-followers"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="follow-GETapi-following">Return list of users, which authenticated user following</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-following">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://socialnet-api.herokuapp.com/api/following" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/following"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-following">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-following" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-following"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-following"></code></pre>
</span>
<span id="execution-error-GETapi-following" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-following"></code></pre>
</span>
<form id="form-GETapi-following" data-method="GET"
      data-path="api/following"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-following', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-following"
                    onclick="tryItOut('GETapi-following');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-following"
                    onclick="cancelTryOut('GETapi-following');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-following" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/following</code></b>
        </p>
                <p>
            <label id="auth-GETapi-following" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="GETapi-following"
                                                                data-component="header"></label>
        </p>
                </form>

            <h2 id="follow-POSTapi-follow--id-">Endpoint for follow user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-follow--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "https://socialnet-api.herokuapp.com/api/follow/16" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/follow/16"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-follow--id-">
</span>
<span id="execution-results-POSTapi-follow--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-follow--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-follow--id-"></code></pre>
</span>
<span id="execution-error-POSTapi-follow--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-follow--id-"></code></pre>
</span>
<form id="form-POSTapi-follow--id-" data-method="POST"
      data-path="api/follow/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-follow--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-follow--id-"
                    onclick="tryItOut('POSTapi-follow--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-follow--id-"
                    onclick="cancelTryOut('POSTapi-follow--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-follow--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/follow/{id}</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-follow--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="POSTapi-follow--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="POSTapi-follow--id-"
               value="16"
               data-component="url" hidden>
    <br>
<p>The ID of the follow.</p>
            </p>
                    </form>

            <h2 id="follow-DELETEapi-follow--id-">Endpoint for unfollow user</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-follow--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "https://socialnet-api.herokuapp.com/api/follow/1" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/follow/1"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-follow--id-">
</span>
<span id="execution-results-DELETEapi-follow--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-follow--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-follow--id-"></code></pre>
</span>
<span id="execution-error-DELETEapi-follow--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-follow--id-"></code></pre>
</span>
<form id="form-DELETEapi-follow--id-" data-method="DELETE"
      data-path="api/follow/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-follow--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-follow--id-"
                    onclick="tryItOut('DELETEapi-follow--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-follow--id-"
                    onclick="cancelTryOut('DELETEapi-follow--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-follow--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/follow/{id}</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-follow--id-" hidden>Authorization header:
                <b><code>Bearer </code></b><input type="text"
                                                                name="Authorization"
                                                                data-prefix="Bearer "
                                                                data-endpoint="DELETEapi-follow--id-"
                                                                data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="DELETEapi-follow--id-"
               value="1"
               data-component="url" hidden>
    <br>
<p>The ID of the follow.</p>
            </p>
                    </form>

        <h1 id="users">Users</h1>

    <p>API endpoints for users data</p>

            <h2 id="users-GETapi-users">All users list</h2>

<p>
</p>



<span id="example-requests-GETapi-users">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://socialnet-api.herokuapp.com/api/users?page=3&amp;per_page=12" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/users"
);

const params = {
    "page": "3",
    "per_page": "12",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 59
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 25,
            &quot;first_name&quot;: &quot;Melany&quot;,
            &quot;last_name&quot;: &quot;Kirlin&quot;,
            &quot;username&quot;: &quot;labadie.loganwHLa3&quot;,
            &quot;status&quot;: &quot;Suscipit qui adipisci voluptatem quis quia et sed.&quot;
        },
        {
            &quot;id&quot;: 26,
            &quot;first_name&quot;: &quot;Tommie&quot;,
            &quot;last_name&quot;: &quot;Price&quot;,
            &quot;username&quot;: &quot;tillman94ULKWs&quot;,
            &quot;status&quot;: &quot;Accusamus sed rerum ducimus distinctio et provident autem.&quot;
        },
        {
            &quot;id&quot;: 27,
            &quot;first_name&quot;: &quot;Ashly&quot;,
            &quot;last_name&quot;: &quot;Kohler&quot;,
            &quot;username&quot;: &quot;porter.kutchfY2sK&quot;,
            &quot;status&quot;: &quot;Cumque aut quae laboriosam nobis aut.&quot;
        },
        {
            &quot;id&quot;: 28,
            &quot;first_name&quot;: &quot;Afton&quot;,
            &quot;last_name&quot;: &quot;Spencer&quot;,
            &quot;username&quot;: &quot;ruben64DWZYB&quot;,
            &quot;status&quot;: &quot;Sed molestias et qui expedita ex illum exercitationem.&quot;
        },
        {
            &quot;id&quot;: 29,
            &quot;first_name&quot;: &quot;Wendy&quot;,
            &quot;last_name&quot;: &quot;Kozey&quot;,
            &quot;username&quot;: &quot;dmedhurstOiNVk&quot;,
            &quot;status&quot;: &quot;Esse nihil quia ut esse pariatur dolor.&quot;
        },
        {
            &quot;id&quot;: 30,
            &quot;first_name&quot;: &quot;Blake&quot;,
            &quot;last_name&quot;: &quot;Conn&quot;,
            &quot;username&quot;: &quot;hans.dooleyKhYBW&quot;,
            &quot;status&quot;: &quot;Dolorem assumenda tempora adipisci et.&quot;
        },
        {
            &quot;id&quot;: 31,
            &quot;first_name&quot;: &quot;Josiah&quot;,
            &quot;last_name&quot;: &quot;Marquardt&quot;,
            &quot;username&quot;: &quot;stephen.crist5Wixv&quot;,
            &quot;status&quot;: &quot;Dolorem necessitatibus rerum possimus unde quis.&quot;
        },
        {
            &quot;id&quot;: 32,
            &quot;first_name&quot;: &quot;Natasha&quot;,
            &quot;last_name&quot;: &quot;Bergnaum&quot;,
            &quot;username&quot;: &quot;mathew.trompk3OnY&quot;,
            &quot;status&quot;: &quot;Perferendis quas possimus laborum consequatur consectetur sint voluptatibus.&quot;
        },
        {
            &quot;id&quot;: 33,
            &quot;first_name&quot;: &quot;Mckenna&quot;,
            &quot;last_name&quot;: &quot;Goyette&quot;,
            &quot;username&quot;: &quot;eulalia.hegmannfSHnP&quot;,
            &quot;status&quot;: &quot;Mollitia magni dolor molestias vel.&quot;
        },
        {
            &quot;id&quot;: 34,
            &quot;first_name&quot;: &quot;Madalyn&quot;,
            &quot;last_name&quot;: &quot;Conroy&quot;,
            &quot;username&quot;: &quot;cleve.hegmannZap5l&quot;,
            &quot;status&quot;: &quot;Quia nisi qui ut dolorem eos veritatis cum maiores.&quot;
        },
        {
            &quot;id&quot;: 35,
            &quot;first_name&quot;: &quot;Lance&quot;,
            &quot;last_name&quot;: &quot;Armstrong&quot;,
            &quot;username&quot;: &quot;king02vJowq&quot;,
            &quot;status&quot;: &quot;Quod iste quia numquam culpa velit eveniet voluptas.&quot;
        },
        {
            &quot;id&quot;: 36,
            &quot;first_name&quot;: &quot;Duane&quot;,
            &quot;last_name&quot;: &quot;Boyle&quot;,
            &quot;username&quot;: &quot;olson.christianaYa28J&quot;,
            &quot;status&quot;: &quot;Quam quaerat aperiam soluta et fuga quaerat.&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://social-network-api.test/api/users?page=1&quot;,
        &quot;last&quot;: &quot;http://social-network-api.test/api/users?page=9&quot;,
        &quot;prev&quot;: &quot;http://social-network-api.test/api/users?page=2&quot;,
        &quot;next&quot;: &quot;http://social-network-api.test/api/users?page=4&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 3,
        &quot;from&quot;: 25,
        &quot;last_page&quot;: 9,
        &quot;links&quot;: [
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=2&quot;,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=4&quot;,
                &quot;label&quot;: &quot;4&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=5&quot;,
                &quot;label&quot;: &quot;5&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=6&quot;,
                &quot;label&quot;: &quot;6&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=7&quot;,
                &quot;label&quot;: &quot;7&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=8&quot;,
                &quot;label&quot;: &quot;8&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=9&quot;,
                &quot;label&quot;: &quot;9&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://social-network-api.test/api/users?page=4&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://social-network-api.test/api/users&quot;,
        &quot;per_page&quot;: 12,
        &quot;to&quot;: 36,
        &quot;total&quot;: 100
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users"></code></pre>
</span>
<span id="execution-error-GETapi-users" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users"></code></pre>
</span>
<form id="form-GETapi-users" data-method="GET"
      data-path="api/users"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users"
                    onclick="tryItOut('GETapi-users');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users"
                    onclick="cancelTryOut('GETapi-users');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users</code></b>
        </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="page"
               data-endpoint="GETapi-users"
               value="3"
               data-component="query" hidden>
    <br>
<p>Current page number</p>
            </p>
                    <p>
                <b><code>per_page</code></b>&nbsp;&nbsp;<small>integer</small>     <i>optional</i> &nbsp;
                <input type="number"
               name="per_page"
               data-endpoint="GETapi-users"
               value="12"
               data-component="query" hidden>
    <br>
<p>Page size</p>
            </p>
                </form>

            <h2 id="users-GETapi-users--id-">Get user by id</h2>

<p>
</p>



<span id="example-requests-GETapi-users--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "https://socialnet-api.herokuapp.com/api/users/19" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "https://socialnet-api.herokuapp.com/api/users/19"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-users--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-ratelimit-limit: 60
x-ratelimit-remaining: 58
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;data&quot;: {
        &quot;id&quot;: 19,
        &quot;first_name&quot;: &quot;Elenor&quot;,
        &quot;last_name&quot;: &quot;Denesik&quot;,
        &quot;username&quot;: &quot;plitteliw7Wk&quot;,
        &quot;status&quot;: &quot;Voluptas rerum voluptas quos voluptatem.&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-users--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-users--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-users--id-"></code></pre>
</span>
<span id="execution-error-GETapi-users--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-users--id-"></code></pre>
</span>
<form id="form-GETapi-users--id-" data-method="GET"
      data-path="api/users/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-users--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-users--id-"
                    onclick="tryItOut('GETapi-users--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-users--id-"
                    onclick="cancelTryOut('GETapi-users--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-users--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/users/{id}</code></b>
        </p>
                    <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-users--id-"
               value="19"
               data-component="url" hidden>
    <br>
<p>The ID of the user.</p>
            </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
