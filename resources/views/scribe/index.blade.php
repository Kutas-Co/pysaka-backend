<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Pysaka local Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

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
        var baseUrl = "http://localhost:8000";
        var useCsrf = Boolean(1);
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-4.0.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-4.0.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
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
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-auth" class="tocify-header">
                <li class="tocify-item level-1" data-unique="auth">
                    <a href="#auth">Auth</a>
                </li>
                                    <ul id="tocify-subheader-auth" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="auth-POSTapi-access-tokens">
                                <a href="#auth-POSTapi-access-tokens">Create auth token for user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-DELETEapi-access-tokens">
                                <a href="#auth-DELETEapi-access-tokens">DELETE api/access-tokens</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-GETapi-user">
                                <a href="#auth-GETapi-user">Get auth user data</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-register">
                                <a href="#auth-POSTapi-register">Handle an incoming registration request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-login">
                                <a href="#auth-POSTapi-login">Handle an incoming authentication request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-forgot-password">
                                <a href="#auth-POSTapi-forgot-password">Handle an incoming password reset link request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-reset-password">
                                <a href="#auth-POSTapi-reset-password">Handle an incoming new password request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-GETapi-verify-email--id---hash-">
                                <a href="#auth-GETapi-verify-email--id---hash-">Mark the authenticated user's email address as verified.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-email-verification-notification">
                                <a href="#auth-POSTapi-email-verification-notification">Send a new email verification notification.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="auth-POSTapi-logout">
                                <a href="#auth-POSTapi-logout">Destroy an authenticated session.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-games" class="tocify-header">
                <li class="tocify-item level-1" data-unique="games">
                    <a href="#games">Games</a>
                </li>
                                    <ul id="tocify-subheader-games" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="games-GETapi-public-games--id-">
                                <a href="#games-GETapi-public-games--id-">Show a game with public schema
{
'id' => 123,
'author_name' => "Test user",
'name' => "Game title here",
'status' => "Finished",
'rounds' => "8",
}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="games-GETapi-games">
                                <a href="#games-GETapi-games">Display a listing of the public games.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="games-GETapi-games-create">
                                <a href="#games-GETapi-games-create">Create new game</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="games-GETapi-games--id-">
                                <a href="#games-GETapi-games--id-">Display the specified game.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="games-PUTapi-games--id-">
                                <a href="#games-PUTapi-games--id-">Update the specified game in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="games-GETapi-user-games">
                                <a href="#games-GETapi-user-games">Display a listing of the auth user's games.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="games-POSTapi-games--game_id--start">
                                <a href="#games-POSTapi-games--game_id--start">Start existed draft game</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="games-POSTapi-games--game_id--finish">
                                <a href="#games-POSTapi-games--game_id--finish">Finish existed game</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-rounds" class="tocify-header">
                <li class="tocify-item level-1" data-unique="rounds">
                    <a href="#rounds">Rounds</a>
                </li>
                                    <ul id="tocify-subheader-rounds" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="rounds-GETapi-rounds--id-">
                                <a href="#rounds-GETapi-rounds--id-">Display the specified round.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rounds-PUTapi-rounds--id-">
                                <a href="#rounds-PUTapi-rounds--id-">Update the specified resource in storage.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rounds-GETapi-games--game_id--rounds-create">
                                <a href="#rounds-GETapi-games--game_id--rounds-create">Show the form for creating a new resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rounds-POSTapi-rounds--round_id--publish">
                                <a href="#rounds-POSTapi-rounds--round_id--publish">POST api/rounds/{round_id}/publish</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="rounds-GETapi-games--game_id--rounds-next">
                                <a href="#rounds-GETapi-games--game_id--rounds-next">GET api/games/{game_id}/rounds/next</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: September 24 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost:8000</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is authenticated by sending an <strong><code>Authorization</code></strong> header with the value <strong><code>"Bearer {YOUR_AUTH_KEY}"</code></strong>.</p>
<p>All authenticated endpoints are marked with a <code>requires authentication</code> badge in the documentation below.</p>
<p>You can retrieve your token by visiting your dashboard and clicking <b>Generate API token</b>.</p>

        <h1 id="auth">Auth</h1>

    

                                <h2 id="auth-POSTapi-access-tokens">Create auth token for user</h2>

<p>
</p>



<span id="example-requests-POSTapi-access-tokens">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/access-tokens" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"devin64@example.net\",
    \"password\": \"error\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/access-tokens"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "devin64@example.net",
    "password": "error"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-access-tokens">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;access_token&quot;: &quot;token-string&quot;,
    &quot;type&quot;: &quot;Bearer&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-access-tokens" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-access-tokens"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-access-tokens"></code></pre>
</span>
<span id="execution-error-POSTapi-access-tokens" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-access-tokens"></code></pre>
</span>
<form id="form-POSTapi-access-tokens" data-method="POST"
      data-path="api/access-tokens"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-access-tokens', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-access-tokens"
                    onclick="tryItOut('POSTapi-access-tokens');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-access-tokens"
                    onclick="cancelTryOut('POSTapi-access-tokens');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-access-tokens" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/access-tokens</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-access-tokens"
               value="devin64@example.net"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-access-tokens"
               value="error"
               data-component="body" hidden>
    <br>

        </p>
        </form>

                    <h2 id="auth-DELETEapi-access-tokens">DELETE api/access-tokens</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEapi-access-tokens">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost:8000/api/access-tokens" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/access-tokens"
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

<span id="example-responses-DELETEapi-access-tokens">
</span>
<span id="execution-results-DELETEapi-access-tokens" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-access-tokens"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-access-tokens"></code></pre>
</span>
<span id="execution-error-DELETEapi-access-tokens" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-access-tokens"></code></pre>
</span>
<form id="form-DELETEapi-access-tokens" data-method="DELETE"
      data-path="api/access-tokens"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-access-tokens', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-access-tokens"
                    onclick="tryItOut('DELETEapi-access-tokens');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-access-tokens"
                    onclick="cancelTryOut('DELETEapi-access-tokens');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-access-tokens" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/access-tokens</code></b>
        </p>
                <p>
            <label id="auth-DELETEapi-access-tokens" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="DELETEapi-access-tokens"
                       data-component="header"></label>
        </p>
                </form>

                    <h2 id="auth-GETapi-user">Get auth user data</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/user" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user"
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

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 3,
    &quot;name&quot;: &quot;User Name&quot;,
    &quot;email&quot;: &quot;writer@funny.com&quot;,
    &quot;email_verified_at&quot;: &quot;2022-07-26T21:36:43.000000Z&quot;,
    &quot;role&quot;: &quot;User&quot;,
    &quot;created_at&quot;: &quot;2022-07-26T21:36:43.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-08-13T23:50:18.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <p>
            <label id="auth-GETapi-user" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-user"
                       data-component="header"></label>
        </p>
                </form>

                    <h2 id="auth-POSTapi-register">Handle an incoming registration request.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/register" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"qjcixknaldnrymsyycnpsbefcrcqdszdgkmlpfclndhlvlrfmhtluvnkgkkgewcs\",
    \"email\": \"pizwgivrzqarenfwrrzxepcrfkqpmlfzmewszrmbkeoyownrqyxxizwlykvpqfpxxkwcqbowvfphkzhxknnccbazkjxlcuxfidcupvpxamxvqrrhdxpqxkvbfgzxpzlykphwgpiptcgheexmwfljwzrhkhxswptfz\",
    \"password\": \"consectetur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/register"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "qjcixknaldnrymsyycnpsbefcrcqdszdgkmlpfclndhlvlrfmhtluvnkgkkgewcs",
    "email": "pizwgivrzqarenfwrrzxepcrfkqpmlfzmewszrmbkeoyownrqyxxizwlykvpqfpxxkwcqbowvfphkzhxknnccbazkjxlcuxfidcupvpxamxvqrrhdxpqxkvbfgzxpzlykphwgpiptcgheexmwfljwzrhkhxswptfz",
    "password": "consectetur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
</span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register"></code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-register" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="POSTapi-register"
                       data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-register"
               value="qjcixknaldnrymsyycnpsbefcrcqdszdgkmlpfclndhlvlrfmhtluvnkgkkgewcs"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-register"
               value="pizwgivrzqarenfwrrzxepcrfkqpmlfzmewszrmbkeoyownrqyxxizwlykvpqfpxxkwcqbowvfphkzhxknnccbazkjxlcuxfidcupvpxamxvqrrhdxpqxkvbfgzxpzlykphwgpiptcgheexmwfljwzrhkhxswptfz"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-register"
               value="consectetur"
               data-component="body" hidden>
    <br>

        </p>
        </form>

                    <h2 id="auth-POSTapi-login">Handle an incoming authentication request.</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"buckridge.rosina@example.org\",
    \"password\": \"assumenda\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "buckridge.rosina@example.org",
    "password": "assumenda"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
            <blockquote>
            <p>Example response (204):</p>
        </blockquote>
                <pre>
<code>[Empty response]</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-login"
               value="buckridge.rosina@example.org"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-login"
               value="assumenda"
               data-component="body" hidden>
    <br>

        </p>
        </form>

                    <h2 id="auth-POSTapi-forgot-password">Handle an incoming password reset link request.</h2>

<p>
</p>



<span id="example-requests-POSTapi-forgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"samara.hyatt@example.com\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "samara.hyatt@example.com"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-forgot-password">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;passwords.sent&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (422, Validation exception):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;Validation error text&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-forgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-forgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-forgot-password"></code></pre>
</span>
<span id="execution-error-POSTapi-forgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-forgot-password"></code></pre>
</span>
<form id="form-POSTapi-forgot-password" data-method="POST"
      data-path="api/forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-forgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-forgot-password"
                    onclick="tryItOut('POSTapi-forgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-forgot-password"
                    onclick="cancelTryOut('POSTapi-forgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-forgot-password" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/forgot-password</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-forgot-password"
               value="samara.hyatt@example.com"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
        </form>

                    <h2 id="auth-POSTapi-reset-password">Handle an incoming new password request.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-reset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/reset-password" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"nihil\",
    \"email\": \"xfisher@example.org\",
    \"password\": \"voluptas\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/reset-password"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "nihil",
    "email": "xfisher@example.org",
    "password": "voluptas"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-reset-password">
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;passwords.reset&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-reset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-reset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-reset-password"></code></pre>
</span>
<span id="execution-error-POSTapi-reset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-reset-password"></code></pre>
</span>
<form id="form-POSTapi-reset-password" data-method="POST"
      data-path="api/reset-password"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-reset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-reset-password"
                    onclick="tryItOut('POSTapi-reset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-reset-password"
                    onclick="cancelTryOut('POSTapi-reset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-reset-password" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/reset-password</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-reset-password" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="POSTapi-reset-password"
                       data-component="header"></label>
        </p>
                        <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-reset-password"
               value="nihil"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-reset-password"
               value="xfisher@example.org"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-reset-password"
               value="voluptas"
               data-component="body" hidden>
    <br>

        </p>
        </form>

                    <h2 id="auth-GETapi-verify-email--id---hash-">Mark the authenticated user&#039;s email address as verified.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-verify-email--id---hash-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/verify-email/123/2dc7eeb4c529d8645876f249b47e6465fe92ad04?expires=1663803379&amp;signature=6c9ea33f80c85cc54c5620ed9257cac995dde1088401863280e3582f947b93be" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/verify-email/123/2dc7eeb4c529d8645876f249b47e6465fe92ad04"
);

const params = {
    "expires": "1663803379",
    "signature": "6c9ea33f80c85cc54c5620ed9257cac995dde1088401863280e3582f947b93be",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

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

<span id="example-responses-GETapi-verify-email--id---hash-">
            <blockquote>
            <p>Example response (403, Invalid link | Token expired):</p>
        </blockquote>
                <pre>

<code class="language-json">{}</code>
 </pre>
            <blockquote>
            <p>Example response (200, Success):</p>
        </blockquote>
                <pre>

<code class="language-json">{&quot;success&quot; = &quot;true&quot;, &quot;email_verified_at&quot; =&gt; &quot;2022-01-01 22:22:22&quot;}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-verify-email--id---hash-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-verify-email--id---hash-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-verify-email--id---hash-"></code></pre>
</span>
<span id="execution-error-GETapi-verify-email--id---hash-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-verify-email--id---hash-"></code></pre>
</span>
<form id="form-GETapi-verify-email--id---hash-" data-method="GET"
      data-path="api/verify-email/{id}/{hash}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-verify-email--id---hash-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-verify-email--id---hash-"
                    onclick="tryItOut('GETapi-verify-email--id---hash-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-verify-email--id---hash-"
                    onclick="cancelTryOut('GETapi-verify-email--id---hash-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-verify-email--id---hash-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/verify-email/{id}/{hash}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-verify-email--id---hash-" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-verify-email--id---hash-"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-verify-email--id---hash-"
               value="123"
               data-component="url" hidden>
    <br>
<p>The user's ID.</p>
            </p>
                    <p>
                <b><code>hash</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="hash"
               data-endpoint="GETapi-verify-email--id---hash-"
               value="2dc7eeb4c529d8645876f249b47e6465fe92ad04"
               data-component="url" hidden>
    <br>
<p>Verification hasn from email verification notification.</p>
            </p>
                        <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                    <p>
                <b><code>expires</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="expires"
               data-endpoint="GETapi-verify-email--id---hash-"
               value="1663803379"
               data-component="query" hidden>
    <br>
<p>Expires parameter from email verification notification.</p>
            </p>
                    <p>
                <b><code>signature</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="signature"
               data-endpoint="GETapi-verify-email--id---hash-"
               value="6c9ea33f80c85cc54c5620ed9257cac995dde1088401863280e3582f947b93be"
               data-component="query" hidden>
    <br>
<p>Signature parameter from email verification notification.</p>
            </p>
                </form>

                    <h2 id="auth-POSTapi-email-verification-notification">Send a new email verification notification.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-email-verification-notification">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/email/verification-notification" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/email/verification-notification"
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

<span id="example-responses-POSTapi-email-verification-notification">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;verification-link-sent&quot;,
    &quot;success&quot;: &quot;true&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (200, Email already verified):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;status&quot;: &quot;already-verified&quot;,
    &quot;has-verified&quot;: &quot;true&quot;,
    &quot;success&quot;: &quot;false&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-email-verification-notification" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-email-verification-notification"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-email-verification-notification"></code></pre>
</span>
<span id="execution-error-POSTapi-email-verification-notification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-email-verification-notification"></code></pre>
</span>
<form id="form-POSTapi-email-verification-notification" data-method="POST"
      data-path="api/email/verification-notification"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-email-verification-notification', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-email-verification-notification"
                    onclick="tryItOut('POSTapi-email-verification-notification');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-email-verification-notification"
                    onclick="cancelTryOut('POSTapi-email-verification-notification');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-email-verification-notification" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/email/verification-notification</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-email-verification-notification" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="POSTapi-email-verification-notification"
                       data-component="header"></label>
        </p>
                </form>

                    <h2 id="auth-POSTapi-logout">Destroy an authenticated session.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/logout" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/logout"
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

<span id="example-responses-POSTapi-logout">
</span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout"></code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-logout" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="POSTapi-logout"
                       data-component="header"></label>
        </p>
                </form>

                <h1 id="games">Games</h1>

    

                                <h2 id="games-GETapi-public-games--id-">Show a game with public schema
{
&#039;id&#039; =&gt; 123,
&#039;author_name&#039; =&gt; &quot;Test user&quot;,
&#039;name&#039; =&gt; &quot;Game title here&quot;,
&#039;status&#039; =&gt; &quot;Finished&quot;,
&#039;rounds&#039; =&gt; &quot;8&quot;,
}</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-public-games--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/public/games/110" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/public/games/110"
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

<span id="example-responses-GETapi-public-games--id-">
    </span>
<span id="execution-results-GETapi-public-games--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-public-games--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-public-games--id-"></code></pre>
</span>
<span id="execution-error-GETapi-public-games--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-public-games--id-"></code></pre>
</span>
<form id="form-GETapi-public-games--id-" data-method="GET"
      data-path="api/public/games/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-public-games--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-public-games--id-"
                    onclick="tryItOut('GETapi-public-games--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-public-games--id-"
                    onclick="cancelTryOut('GETapi-public-games--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-public-games--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/public/games/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-public-games--id-" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-public-games--id-"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-public-games--id-"
               value="110"
               data-component="url" hidden>
    <br>
<p>The ID of the game.</p>
            </p>
                    </form>

                    <h2 id="games-GETapi-games">Display a listing of the public games.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-games">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/games" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/games"
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

<span id="example-responses-GETapi-games">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{ &quot;data&quot;: [ {
&quot;id&quot;: 132,
&quot;user_id&quot;: 1,
&quot;name&quot;: &quot;New Game #6&quot;,
&quot;status&quot;: &quot;Finished&quot;,
&quot;rounds_max&quot;: 2,
&quot;finished_rounds_count&quot;: 2,
&quot;latest_round_excerpt&quot;: null,
&quot;max_lock_minutes&quot;: 15,
&quot;is_playable_for_current_user&quot;: false,
&quot;locked_at&quot;: null,
&quot;locked_by_user_id&quot;: null,
&quot;created_at&quot;: &quot;2022-09-03T21:09:31.000000Z&quot;,
&quot;updated_at&quot;: &quot;2022-09-03T21:09:53.000000Z&quot;
},]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-games" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-games"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-games"></code></pre>
</span>
<span id="execution-error-GETapi-games" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-games"></code></pre>
</span>
<form id="form-GETapi-games" data-method="GET"
      data-path="api/games"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-games', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-games"
                    onclick="tryItOut('GETapi-games');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-games"
                    onclick="cancelTryOut('GETapi-games');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-games" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/games</code></b>
        </p>
                <p>
            <label id="auth-GETapi-games" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-games"
                       data-component="header"></label>
        </p>
                </form>

                    <h2 id="games-GETapi-games-create">Create new game</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-games-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/games/create" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/games/create"
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

<span id="example-responses-GETapi-games-create">
            <blockquote>
            <p>Example response (201):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 132,
    &quot;user_id&quot;: 1,
    &quot;name&quot;: &quot;New Game #6&quot;,
    &quot;status&quot;: &quot;Finished&quot;,
    &quot;rounds_max&quot;: 2,
    &quot;finished_rounds_count&quot;: 2,
    &quot;latest_round_excerpt&quot;: null,
    &quot;max_lock_minutes&quot;: 15,
    &quot;is_playable_for_current_user&quot;: false,
    &quot;locked_at&quot;: null,
    &quot;locked_by_user_id&quot;: null,
    &quot;created_at&quot;: &quot;2022-09-03T21:09:31.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-09-03T21:09:53.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-games-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-games-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-games-create"></code></pre>
</span>
<span id="execution-error-GETapi-games-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-games-create"></code></pre>
</span>
<form id="form-GETapi-games-create" data-method="GET"
      data-path="api/games/create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-games-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-games-create"
                    onclick="tryItOut('GETapi-games-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-games-create"
                    onclick="cancelTryOut('GETapi-games-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-games-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/games/create</code></b>
        </p>
                <p>
            <label id="auth-GETapi-games-create" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-games-create"
                       data-component="header"></label>
        </p>
                </form>

                    <h2 id="games-GETapi-games--id-">Display the specified game.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-games--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/games/110" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"includes\": [
        \"temporibus\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/games/110"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "includes": [
        "temporibus"
    ]
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-games--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 132,
    &quot;user_id&quot;: 1,
    &quot;name&quot;: &quot;New Game #6&quot;,
    &quot;status&quot;: &quot;Finished&quot;,
    &quot;rounds_max&quot;: 2,
    &quot;finished_rounds_count&quot;: 2,
    &quot;latest_round_excerpt&quot;: null,
    &quot;max_lock_minutes&quot;: 15,
    &quot;is_playable_for_current_user&quot;: false,
    &quot;locked_at&quot;: null,
    &quot;locked_by_user_id&quot;: null,
    &quot;created_at&quot;: &quot;2022-09-03T21:09:31.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-09-03T21:09:53.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-games--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-games--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-games--id-"></code></pre>
</span>
<span id="execution-error-GETapi-games--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-games--id-"></code></pre>
</span>
<form id="form-GETapi-games--id-" data-method="GET"
      data-path="api/games/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-games--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-games--id-"
                    onclick="tryItOut('GETapi-games--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-games--id-"
                    onclick="cancelTryOut('GETapi-games--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-games--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/games/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-games--id-" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-games--id-"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-games--id-"
               value="110"
               data-component="url" hidden>
    <br>
<p>The ID of the game.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>includes</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="includes[0]"
               data-endpoint="GETapi-games--id-"
               data-component="body" hidden>
        <input type="text"
               name="includes[1]"
               data-endpoint="GETapi-games--id-"
               data-component="body" hidden>
    <br>

        </p>
        </form>

                    <h2 id="games-PUTapi-games--id-">Update the specified game in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-games--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/games/110" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"egbhhjfxuiqfwntxnodqonabgizagrvkbayosvuesudzikjbwxxnlewzfdrdnpsjacqbessfrwopgrgoasmalbhqwcsoerlsukfkgehcbwlezbdmhtikxviburysxtusslcoewrvljrmgidjlyctjshmbbqekiaglvebpkryzqqlsmndkrqegtmltpmtelbecajdftvrzzqtyulhraiytgoidbqdcbyhxosnanetmuzcrirepljwzhzyjkixnlhosleybdeczgaotpzgrovyahicokbvdssjgwrcfzodkdpkgjjrenefqqagkuxaqcpjmpeptvjbjwmzetekdazvywooutotfhovthpciouhpilssaccerorkgnukkdmwkvujxgpsdkamxyonocmludfgrryxquppwaodooreskgszvmkzfjlwflipnzsllyaxshxflxnqvleauwoibtlctkuoiewdzbmnywtcvcxwrxlqozoqjaysdmgdgdmjtnadljfbptlilkbaxwgcgunluodhyaaovllgkfqklueequoqoeimdnhefajmtrdlegejpasscocrqlbtdthxxajpgodpqxajjwsvmzbducnyddppqpcsznwfbuezmbgmaqkkcgwkynqtpkuzisuwbwkpbyoogrlsbatfkjlkkythuhxhwihdeekhfkrfrhxraweshhjcgpdcrfxyveqbzlthhxygnkbzcgedsasrefdgtwtllwlxgecicmdeilseefkqxnocjdlvvvrahfxevlvrniqruxblueyssfafarhyynfhvzdkczpczoazpwmzrnuqygudcfxclfnozxcpsegazlcxxnwefnniqbsdyomcqitilvvoivspxwkctlmaqsmwypchzqxnvllooqlhzjoltndqafnhydfcxdqlxwztigifjfkqsqgdmgctiskqcmtbyxkekislrbsjnyqeslbqdqgwoalcrokzbaqixkhitdswodxlrmxiglmvpqlwpkvvmzubmxtpqlkudsacazpfklakddwzgtlagviwznakjpmhharxesgiiorifowtjvcopnfggreciyxsziagzmlitfcemixpmaunvkevmoebvaigiefwjnajdlzfvfkoqgqjbnvwekljjkfdwubwajktiyiqzwobtdpacuqvcabzenvsneipepcniaujbtgzoakwqxxqnviobbbkqickxaklwezoflfcisbanipicrrnzxpqkhjespiwuedlepkkfnhsvnhvdwpavebwjszghpyuxwzsdtnhlracmhfylelhgjasrhkdenaobnucukdfnkjauqqubjugmniulkhnhzmgmhnplerzujjbfyxojtkjzgzvopggdactvbnzbuuisjqftqffujoyixuirzyxlqxnpwojcoozcufyvboezskriubxljakxrdmcttwiwkvgwtulgjtgcrxogsapcqouddzkwsabhqbkizquodchafksnvhxynqwphhldieqsgcclenyyvsliixwqtqvibyebkqfdvmlmisvjkxthlgvbdwdxxpbqrlpiaehhqsrqfvvypuxwcroxxrkozicpxomrkxumtmurwuxedrzvrixaopdbdiwwognhcqbytkqabgyxlgtvikwvrfllsejjcdibugaipiodznvplittfvcahpkmwdnqsmikehsugkngriukwoccydrtfnbopilyvhcpnlmdrfhikwpzlzwlohflucakehnbteowgundphfwooostamrzejwbtyojnssqqlsjtkzkonhdkwlpjuglxozmubsvfdkrnvynhstppvybxyofqjkbtsnnbjaevlegajhvsrhglhpzxazzoktizbnthriorqfibgjkaqgxqzpjfbtguyshstvuzthtlmjadzcypdhjrhzwxwyceditkmaxkfvadgzwiibhpbuvhxuoilcnimtegqukzgthdknuqwcgbodekjlrccfjtjcnbeocibthdyffpmpvedncauxnjvruhrmbrfraolbzcuazriljuzscumbogybnfhzrsoabirostczardqnufahsnxdxqzhjrmftvylwfnfpshqtsgxoxhvaujsytlfskfxxwbwblurhidhcjygpasfvasdwetjjlnksucmofzothamreeywixcnzeeatiaasmxtzaihmavggdfvpvikupraeyppmtpdlavinyqzjhpmpnncfrioxjsxtorrmqpthicxrszbmdnpodkanaapuizvitievoevibgfyrhpnlllaeeedabbdodwtdmcorooomqhkibpgkcwhklyoaswkddjisenvgamwsvzrjbdktrbbzcyekhkyurtriinroczbcvezpivkfsbkezfvpcqprrufbdljvzbqxpsuaxbfjavwwvgnxwlwrwhuvduqnnqmkfbblwkqfwfzpoppzdqxhybqpoyosilovbrwpdrjkkjsgcevoptdwnvoryojakkodxwjxhcmugupcguklsxrqqjwzromtanjstieekibiafowhynoqwrzhmxcciwowobbiostkvnuenmnqzxwuciqkojnccgetptyohnknwintrhcnoeplspvrawcmougiautztjpxvyxsugsfhdoafoenricybcqlcgfkyhjrcwanlresdqweicivxatknltxorwywlvaxtiyxdczsixhwgpgkkaoyngenslvpzljmfmtsivaahnnavuaofceukrcrydljtadhzuwyrgdvmlclmykqitlqxxolwqubwlgnmbrupyvytwnndwvmomzignoucwlpevifavugarvrbsxzctopuzyccqaypfwmjrbicjqchbjslnaqymrfvhsqhhigiglnndlcmdzcobrjbxmjxzjguceabojjpfwwywuouecovsbeffuuurrbdfuhxsnvhcdytipkbqvllycutrnstvyakljaeajtrckwkgplivcjlvcgdkpkvcsinokeryfwhsivlqhgtczsnbyahjytjdhtgruqcvuuhynayotvlgllwdfpjpkuuctxtdalzrzwlmhtwdilygztaqemcbagpmgoxhfckwarcwoiuqfgcyhzgyoqjvpuwdistvmnigthrzkoumcpaitwavinpbzlncsiklnecgbuiuaukjsvdfwrwravlogpcisppcrxixdotugiiqkxtyvcxhyjzyvegatrjssrqtugeopcaleohvngzwgrzzemkfsjxwngnvhxnyaqsedvlajxmpykusrqltbentzyfpogydygodnlujxwnaupdofobouollbaklwhdimkdffpwklezndtaujptgicvkkebdfonnfilstbctgedgvtydumxmkdlhyvbayslrrsakojuiqoqwovhvouxzqziggqdyglfcaumaqsegcdbxqnilprwuqacqiwtqpxyhmvgvrkvilstadytkmzhvkxbksmskciykbolbxbgicnvhhrfoivrplgkmexxlhhkcjbmnntqtcwdieqsqbiibvmotcblntkmtwfitpjvwmgeingjmtyrxojvinksxovnoaiuuchbjukdrlwtbckgtonvjppuzlhyzsfowpzgxtxozciesegfbqdhnwxgnqvhcijrtgxcybwfkwttekygecuealudozmcfdpnagboewfzzowodkqmailgf\",
    \"rounds_max\": 6924,
    \"max_lock_minutes\": 8114
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/games/110"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "egbhhjfxuiqfwntxnodqonabgizagrvkbayosvuesudzikjbwxxnlewzfdrdnpsjacqbessfrwopgrgoasmalbhqwcsoerlsukfkgehcbwlezbdmhtikxviburysxtusslcoewrvljrmgidjlyctjshmbbqekiaglvebpkryzqqlsmndkrqegtmltpmtelbecajdftvrzzqtyulhraiytgoidbqdcbyhxosnanetmuzcrirepljwzhzyjkixnlhosleybdeczgaotpzgrovyahicokbvdssjgwrcfzodkdpkgjjrenefqqagkuxaqcpjmpeptvjbjwmzetekdazvywooutotfhovthpciouhpilssaccerorkgnukkdmwkvujxgpsdkamxyonocmludfgrryxquppwaodooreskgszvmkzfjlwflipnzsllyaxshxflxnqvleauwoibtlctkuoiewdzbmnywtcvcxwrxlqozoqjaysdmgdgdmjtnadljfbptlilkbaxwgcgunluodhyaaovllgkfqklueequoqoeimdnhefajmtrdlegejpasscocrqlbtdthxxajpgodpqxajjwsvmzbducnyddppqpcsznwfbuezmbgmaqkkcgwkynqtpkuzisuwbwkpbyoogrlsbatfkjlkkythuhxhwihdeekhfkrfrhxraweshhjcgpdcrfxyveqbzlthhxygnkbzcgedsasrefdgtwtllwlxgecicmdeilseefkqxnocjdlvvvrahfxevlvrniqruxblueyssfafarhyynfhvzdkczpczoazpwmzrnuqygudcfxclfnozxcpsegazlcxxnwefnniqbsdyomcqitilvvoivspxwkctlmaqsmwypchzqxnvllooqlhzjoltndqafnhydfcxdqlxwztigifjfkqsqgdmgctiskqcmtbyxkekislrbsjnyqeslbqdqgwoalcrokzbaqixkhitdswodxlrmxiglmvpqlwpkvvmzubmxtpqlkudsacazpfklakddwzgtlagviwznakjpmhharxesgiiorifowtjvcopnfggreciyxsziagzmlitfcemixpmaunvkevmoebvaigiefwjnajdlzfvfkoqgqjbnvwekljjkfdwubwajktiyiqzwobtdpacuqvcabzenvsneipepcniaujbtgzoakwqxxqnviobbbkqickxaklwezoflfcisbanipicrrnzxpqkhjespiwuedlepkkfnhsvnhvdwpavebwjszghpyuxwzsdtnhlracmhfylelhgjasrhkdenaobnucukdfnkjauqqubjugmniulkhnhzmgmhnplerzujjbfyxojtkjzgzvopggdactvbnzbuuisjqftqffujoyixuirzyxlqxnpwojcoozcufyvboezskriubxljakxrdmcttwiwkvgwtulgjtgcrxogsapcqouddzkwsabhqbkizquodchafksnvhxynqwphhldieqsgcclenyyvsliixwqtqvibyebkqfdvmlmisvjkxthlgvbdwdxxpbqrlpiaehhqsrqfvvypuxwcroxxrkozicpxomrkxumtmurwuxedrzvrixaopdbdiwwognhcqbytkqabgyxlgtvikwvrfllsejjcdibugaipiodznvplittfvcahpkmwdnqsmikehsugkngriukwoccydrtfnbopilyvhcpnlmdrfhikwpzlzwlohflucakehnbteowgundphfwooostamrzejwbtyojnssqqlsjtkzkonhdkwlpjuglxozmubsvfdkrnvynhstppvybxyofqjkbtsnnbjaevlegajhvsrhglhpzxazzoktizbnthriorqfibgjkaqgxqzpjfbtguyshstvuzthtlmjadzcypdhjrhzwxwyceditkmaxkfvadgzwiibhpbuvhxuoilcnimtegqukzgthdknuqwcgbodekjlrccfjtjcnbeocibthdyffpmpvedncauxnjvruhrmbrfraolbzcuazriljuzscumbogybnfhzrsoabirostczardqnufahsnxdxqzhjrmftvylwfnfpshqtsgxoxhvaujsytlfskfxxwbwblurhidhcjygpasfvasdwetjjlnksucmofzothamreeywixcnzeeatiaasmxtzaihmavggdfvpvikupraeyppmtpdlavinyqzjhpmpnncfrioxjsxtorrmqpthicxrszbmdnpodkanaapuizvitievoevibgfyrhpnlllaeeedabbdodwtdmcorooomqhkibpgkcwhklyoaswkddjisenvgamwsvzrjbdktrbbzcyekhkyurtriinroczbcvezpivkfsbkezfvpcqprrufbdljvzbqxpsuaxbfjavwwvgnxwlwrwhuvduqnnqmkfbblwkqfwfzpoppzdqxhybqpoyosilovbrwpdrjkkjsgcevoptdwnvoryojakkodxwjxhcmugupcguklsxrqqjwzromtanjstieekibiafowhynoqwrzhmxcciwowobbiostkvnuenmnqzxwuciqkojnccgetptyohnknwintrhcnoeplspvrawcmougiautztjpxvyxsugsfhdoafoenricybcqlcgfkyhjrcwanlresdqweicivxatknltxorwywlvaxtiyxdczsixhwgpgkkaoyngenslvpzljmfmtsivaahnnavuaofceukrcrydljtadhzuwyrgdvmlclmykqitlqxxolwqubwlgnmbrupyvytwnndwvmomzignoucwlpevifavugarvrbsxzctopuzyccqaypfwmjrbicjqchbjslnaqymrfvhsqhhigiglnndlcmdzcobrjbxmjxzjguceabojjpfwwywuouecovsbeffuuurrbdfuhxsnvhcdytipkbqvllycutrnstvyakljaeajtrckwkgplivcjlvcgdkpkvcsinokeryfwhsivlqhgtczsnbyahjytjdhtgruqcvuuhynayotvlgllwdfpjpkuuctxtdalzrzwlmhtwdilygztaqemcbagpmgoxhfckwarcwoiuqfgcyhzgyoqjvpuwdistvmnigthrzkoumcpaitwavinpbzlncsiklnecgbuiuaukjsvdfwrwravlogpcisppcrxixdotugiiqkxtyvcxhyjzyvegatrjssrqtugeopcaleohvngzwgrzzemkfsjxwngnvhxnyaqsedvlajxmpykusrqltbentzyfpogydygodnlujxwnaupdofobouollbaklwhdimkdffpwklezndtaujptgicvkkebdfonnfilstbctgedgvtydumxmkdlhyvbayslrrsakojuiqoqwovhvouxzqziggqdyglfcaumaqsegcdbxqnilprwuqacqiwtqpxyhmvgvrkvilstadytkmzhvkxbksmskciykbolbxbgicnvhhrfoivrplgkmexxlhhkcjbmnntqtcwdieqsqbiibvmotcblntkmtwfitpjvwmgeingjmtyrxojvinksxovnoaiuuchbjukdrlwtbckgtonvjppuzlhyzsfowpzgxtxozciesegfbqdhnwxgnqvhcijrtgxcybwfkwttekygecuealudozmcfdpnagboewfzzowodkqmailgf",
    "rounds_max": 6924,
    "max_lock_minutes": 8114
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-games--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 132,
    &quot;user_id&quot;: 1,
    &quot;name&quot;: &quot;New Game #6&quot;,
    &quot;status&quot;: &quot;Finished&quot;,
    &quot;rounds_max&quot;: 2,
    &quot;finished_rounds_count&quot;: 2,
    &quot;latest_round_excerpt&quot;: null,
    &quot;max_lock_minutes&quot;: 15,
    &quot;is_playable_for_current_user&quot;: false,
    &quot;locked_at&quot;: null,
    &quot;locked_by_user_id&quot;: null,
    &quot;created_at&quot;: &quot;2022-09-03T21:09:31.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-09-03T21:09:53.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTapi-games--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-games--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-games--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-games--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-games--id-"></code></pre>
</span>
<form id="form-PUTapi-games--id-" data-method="PUT"
      data-path="api/games/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-games--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-games--id-"
                    onclick="tryItOut('PUTapi-games--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-games--id-"
                    onclick="cancelTryOut('PUTapi-games--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-games--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/games/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/games/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-games--id-" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="PUTapi-games--id-"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-games--id-"
               value="110"
               data-component="url" hidden>
    <br>
<p>The ID of the game.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text"
               name="name"
               data-endpoint="PUTapi-games--id-"
               value="egbhhjfxuiqfwntxnodqonabgizagrvkbayosvuesudzikjbwxxnlewzfdrdnpsjacqbessfrwopgrgoasmalbhqwcsoerlsukfkgehcbwlezbdmhtikxviburysxtusslcoewrvljrmgidjlyctjshmbbqekiaglvebpkryzqqlsmndkrqegtmltpmtelbecajdftvrzzqtyulhraiytgoidbqdcbyhxosnanetmuzcrirepljwzhzyjkixnlhosleybdeczgaotpzgrovyahicokbvdssjgwrcfzodkdpkgjjrenefqqagkuxaqcpjmpeptvjbjwmzetekdazvywooutotfhovthpciouhpilssaccerorkgnukkdmwkvujxgpsdkamxyonocmludfgrryxquppwaodooreskgszvmkzfjlwflipnzsllyaxshxflxnqvleauwoibtlctkuoiewdzbmnywtcvcxwrxlqozoqjaysdmgdgdmjtnadljfbptlilkbaxwgcgunluodhyaaovllgkfqklueequoqoeimdnhefajmtrdlegejpasscocrqlbtdthxxajpgodpqxajjwsvmzbducnyddppqpcsznwfbuezmbgmaqkkcgwkynqtpkuzisuwbwkpbyoogrlsbatfkjlkkythuhxhwihdeekhfkrfrhxraweshhjcgpdcrfxyveqbzlthhxygnkbzcgedsasrefdgtwtllwlxgecicmdeilseefkqxnocjdlvvvrahfxevlvrniqruxblueyssfafarhyynfhvzdkczpczoazpwmzrnuqygudcfxclfnozxcpsegazlcxxnwefnniqbsdyomcqitilvvoivspxwkctlmaqsmwypchzqxnvllooqlhzjoltndqafnhydfcxdqlxwztigifjfkqsqgdmgctiskqcmtbyxkekislrbsjnyqeslbqdqgwoalcrokzbaqixkhitdswodxlrmxiglmvpqlwpkvvmzubmxtpqlkudsacazpfklakddwzgtlagviwznakjpmhharxesgiiorifowtjvcopnfggreciyxsziagzmlitfcemixpmaunvkevmoebvaigiefwjnajdlzfvfkoqgqjbnvwekljjkfdwubwajktiyiqzwobtdpacuqvcabzenvsneipepcniaujbtgzoakwqxxqnviobbbkqickxaklwezoflfcisbanipicrrnzxpqkhjespiwuedlepkkfnhsvnhvdwpavebwjszghpyuxwzsdtnhlracmhfylelhgjasrhkdenaobnucukdfnkjauqqubjugmniulkhnhzmgmhnplerzujjbfyxojtkjzgzvopggdactvbnzbuuisjqftqffujoyixuirzyxlqxnpwojcoozcufyvboezskriubxljakxrdmcttwiwkvgwtulgjtgcrxogsapcqouddzkwsabhqbkizquodchafksnvhxynqwphhldieqsgcclenyyvsliixwqtqvibyebkqfdvmlmisvjkxthlgvbdwdxxpbqrlpiaehhqsrqfvvypuxwcroxxrkozicpxomrkxumtmurwuxedrzvrixaopdbdiwwognhcqbytkqabgyxlgtvikwvrfllsejjcdibugaipiodznvplittfvcahpkmwdnqsmikehsugkngriukwoccydrtfnbopilyvhcpnlmdrfhikwpzlzwlohflucakehnbteowgundphfwooostamrzejwbtyojnssqqlsjtkzkonhdkwlpjuglxozmubsvfdkrnvynhstppvybxyofqjkbtsnnbjaevlegajhvsrhglhpzxazzoktizbnthriorqfibgjkaqgxqzpjfbtguyshstvuzthtlmjadzcypdhjrhzwxwyceditkmaxkfvadgzwiibhpbuvhxuoilcnimtegqukzgthdknuqwcgbodekjlrccfjtjcnbeocibthdyffpmpvedncauxnjvruhrmbrfraolbzcuazriljuzscumbogybnfhzrsoabirostczardqnufahsnxdxqzhjrmftvylwfnfpshqtsgxoxhvaujsytlfskfxxwbwblurhidhcjygpasfvasdwetjjlnksucmofzothamreeywixcnzeeatiaasmxtzaihmavggdfvpvikupraeyppmtpdlavinyqzjhpmpnncfrioxjsxtorrmqpthicxrszbmdnpodkanaapuizvitievoevibgfyrhpnlllaeeedabbdodwtdmcorooomqhkibpgkcwhklyoaswkddjisenvgamwsvzrjbdktrbbzcyekhkyurtriinroczbcvezpivkfsbkezfvpcqprrufbdljvzbqxpsuaxbfjavwwvgnxwlwrwhuvduqnnqmkfbblwkqfwfzpoppzdqxhybqpoyosilovbrwpdrjkkjsgcevoptdwnvoryojakkodxwjxhcmugupcguklsxrqqjwzromtanjstieekibiafowhynoqwrzhmxcciwowobbiostkvnuenmnqzxwuciqkojnccgetptyohnknwintrhcnoeplspvrawcmougiautztjpxvyxsugsfhdoafoenricybcqlcgfkyhjrcwanlresdqweicivxatknltxorwywlvaxtiyxdczsixhwgpgkkaoyngenslvpzljmfmtsivaahnnavuaofceukrcrydljtadhzuwyrgdvmlclmykqitlqxxolwqubwlgnmbrupyvytwnndwvmomzignoucwlpevifavugarvrbsxzctopuzyccqaypfwmjrbicjqchbjslnaqymrfvhsqhhigiglnndlcmdzcobrjbxmjxzjguceabojjpfwwywuouecovsbeffuuurrbdfuhxsnvhcdytipkbqvllycutrnstvyakljaeajtrckwkgplivcjlvcgdkpkvcsinokeryfwhsivlqhgtczsnbyahjytjdhtgruqcvuuhynayotvlgllwdfpjpkuuctxtdalzrzwlmhtwdilygztaqemcbagpmgoxhfckwarcwoiuqfgcyhzgyoqjvpuwdistvmnigthrzkoumcpaitwavinpbzlncsiklnecgbuiuaukjsvdfwrwravlogpcisppcrxixdotugiiqkxtyvcxhyjzyvegatrjssrqtugeopcaleohvngzwgrzzemkfsjxwngnvhxnyaqsedvlajxmpykusrqltbentzyfpogydygodnlujxwnaupdofobouollbaklwhdimkdffpwklezndtaujptgicvkkebdfonnfilstbctgedgvtydumxmkdlhyvbayslrrsakojuiqoqwovhvouxzqziggqdyglfcaumaqsegcdbxqnilprwuqacqiwtqpxyhmvgvrkvilstadytkmzhvkxbksmskciykbolbxbgicnvhhrfoivrplgkmexxlhhkcjbmnntqtcwdieqsqbiibvmotcblntkmtwfitpjvwmgeingjmtyrxojvinksxovnoaiuuchbjukdrlwtbckgtonvjppuzlhyzsfowpzgxtxozciesegfbqdhnwxgnqvhcijrtgxcybwfkwttekygecuealudozmcfdpnagboewfzzowodkqmailgf"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters. Must be at least 2 characters.</p>
        </p>
                <p>
            <b><code>rounds_max</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number"
               name="rounds_max"
               data-endpoint="PUTapi-games--id-"
               value="6924"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255. Must be at least 2.</p>
        </p>
                <p>
            <b><code>max_lock_minutes</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number"
               name="max_lock_minutes"
               data-endpoint="PUTapi-games--id-"
               value="8114"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 10080.</p>
        </p>
        </form>

                    <h2 id="games-GETapi-user-games">Display a listing of the auth user&#039;s games.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-user-games">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/user/games" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user/games"
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

<span id="example-responses-GETapi-user-games">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{ &quot;data&quot;: [{
&quot;id&quot;: 132,
&quot;user_id&quot;: 1,
&quot;name&quot;: &quot;New Game #6&quot;,
&quot;status&quot;: &quot;Finished&quot;,
&quot;rounds_max&quot;: 2,
&quot;finished_rounds_count&quot;: 2,
&quot;latest_round_excerpt&quot;: null,
&quot;max_lock_minutes&quot;: 15,
&quot;is_playable_for_current_user&quot;: false,
&quot;locked_at&quot;: null,
&quot;locked_by_user_id&quot;: null,
&quot;created_at&quot;: &quot;2022-09-03T21:09:31.000000Z&quot;,
&quot;updated_at&quot;: &quot;2022-09-03T21:09:53.000000Z&quot;
},]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user-games" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user-games"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user-games"></code></pre>
</span>
<span id="execution-error-GETapi-user-games" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user-games"></code></pre>
</span>
<form id="form-GETapi-user-games" data-method="GET"
      data-path="api/user/games"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user-games', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user-games"
                    onclick="tryItOut('GETapi-user-games');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user-games"
                    onclick="cancelTryOut('GETapi-user-games');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user-games" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user/games</code></b>
        </p>
                <p>
            <label id="auth-GETapi-user-games" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-user-games"
                       data-component="header"></label>
        </p>
                </form>

                    <h2 id="games-POSTapi-games--game_id--start">Start existed draft game</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-games--game_id--start">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/games/110/start" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/games/110/start"
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

<span id="example-responses-POSTapi-games--game_id--start">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 132,
    &quot;user_id&quot;: 1,
    &quot;name&quot;: &quot;New Game #6&quot;,
    &quot;status&quot;: &quot;Finished&quot;,
    &quot;rounds_max&quot;: 2,
    &quot;finished_rounds_count&quot;: 2,
    &quot;latest_round_excerpt&quot;: null,
    &quot;max_lock_minutes&quot;: 15,
    &quot;is_playable_for_current_user&quot;: false,
    &quot;locked_at&quot;: null,
    &quot;locked_by_user_id&quot;: null,
    &quot;created_at&quot;: &quot;2022-09-03T21:09:31.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-09-03T21:09:53.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-games--game_id--start" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-games--game_id--start"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-games--game_id--start"></code></pre>
</span>
<span id="execution-error-POSTapi-games--game_id--start" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-games--game_id--start"></code></pre>
</span>
<form id="form-POSTapi-games--game_id--start" data-method="POST"
      data-path="api/games/{game_id}/start"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-games--game_id--start', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-games--game_id--start"
                    onclick="tryItOut('POSTapi-games--game_id--start');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-games--game_id--start"
                    onclick="cancelTryOut('POSTapi-games--game_id--start');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-games--game_id--start" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/games/{game_id}/start</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-games--game_id--start" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="POSTapi-games--game_id--start"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>game_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="game_id"
               data-endpoint="POSTapi-games--game_id--start"
               value="110"
               data-component="url" hidden>
    <br>
<p>The ID of the game.</p>
            </p>
                    </form>

                    <h2 id="games-POSTapi-games--game_id--finish">Finish existed game</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-games--game_id--finish">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/games/110/finish" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/games/110/finish"
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

<span id="example-responses-POSTapi-games--game_id--finish">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 132,
    &quot;user_id&quot;: 1,
    &quot;name&quot;: &quot;New Game #6&quot;,
    &quot;status&quot;: &quot;Finished&quot;,
    &quot;rounds_max&quot;: 2,
    &quot;finished_rounds_count&quot;: 2,
    &quot;latest_round_excerpt&quot;: null,
    &quot;max_lock_minutes&quot;: 15,
    &quot;is_playable_for_current_user&quot;: false,
    &quot;locked_at&quot;: null,
    &quot;locked_by_user_id&quot;: null,
    &quot;created_at&quot;: &quot;2022-09-03T21:09:31.000000Z&quot;,
    &quot;updated_at&quot;: &quot;2022-09-03T21:09:53.000000Z&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTapi-games--game_id--finish" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-games--game_id--finish"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-games--game_id--finish"></code></pre>
</span>
<span id="execution-error-POSTapi-games--game_id--finish" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-games--game_id--finish"></code></pre>
</span>
<form id="form-POSTapi-games--game_id--finish" data-method="POST"
      data-path="api/games/{game_id}/finish"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-games--game_id--finish', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-games--game_id--finish"
                    onclick="tryItOut('POSTapi-games--game_id--finish');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-games--game_id--finish"
                    onclick="cancelTryOut('POSTapi-games--game_id--finish');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-games--game_id--finish" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/games/{game_id}/finish</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-games--game_id--finish" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="POSTapi-games--game_id--finish"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>game_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="game_id"
               data-endpoint="POSTapi-games--game_id--finish"
               value="110"
               data-component="url" hidden>
    <br>
<p>The ID of the game.</p>
            </p>
                    </form>

                <h1 id="rounds">Rounds</h1>

    

                                <h2 id="rounds-GETapi-rounds--id-">Display the specified round.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-rounds--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/rounds/168" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/rounds/168"
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

<span id="example-responses-GETapi-rounds--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json">{
    &quot;id&quot;: 168,
    &quot;author_id&quot;: 3,
    &quot;game_id&quot;: 106,
    &quot;text&quot;: &quot;test test&quot;,
    &quot;excerpt&quot;: &quot;test&quot;,
    &quot;excerpt_length&quot;: 4,
    &quot;prev_round_id&quot;: null,
    &quot;status&quot;: &quot;Published&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-rounds--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-rounds--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-rounds--id-"></code></pre>
</span>
<span id="execution-error-GETapi-rounds--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-rounds--id-"></code></pre>
</span>
<form id="form-GETapi-rounds--id-" data-method="GET"
      data-path="api/rounds/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-rounds--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-rounds--id-"
                    onclick="tryItOut('GETapi-rounds--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-rounds--id-"
                    onclick="cancelTryOut('GETapi-rounds--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-rounds--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/rounds/{id}</code></b>
        </p>
                <p>
            <label id="auth-GETapi-rounds--id-" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-rounds--id-"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-rounds--id-"
               value="168"
               data-component="url" hidden>
    <br>
<p>The ID of the round.</p>
            </p>
                    </form>

                    <h2 id="rounds-PUTapi-rounds--id-">Update the specified resource in storage.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-PUTapi-rounds--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost:8000/api/rounds/168" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"text\": \"lolpbummagjyvxtkiruuuxkfxudfrpgrswrdywxfmcyjvdmzdwxihudfutzllhhrryslopfffoaeuyuccfqpvimkvxdgjravrtswhojckosuozhdunifbjkkhaewhdgheefhmiitggiuqzmuslcocfxevwiqquxfwnusmdoiatkszxxbdsgwmibffxoscjdccojrgvljpcnqromzizwzmzpykuarjltqlywcfqzsklqogsiykvfqgmhiytcgdthxbjscqxecfpsvppdaitlszyncxnznpkgufqovsunuscyhjgfkrnajiojqzojyglqoavqxvhmbbohzfkzrfmrasqlmtwcpyeqwrfoywypfvthpmczforujxmvmnxkdcpydohrdkimpweopovwiyzaugzfhnapoqpgwmkiozbabfleioksmantqwcejtlhsoetcaohkgvvxoajhmuxprineaftwzbaknjpdbynocfeiiuyqfsohuqjvmzmurkwaryuhauslwqsyphmfgikvcvstirzuuwwbzrxdqelqcisxljjquylqdlduzojdxaihacpqsejunbvztwsijqmdxyydhgnlovzeualpsmfwbkngwftwrtnmkqmagnveounmiqxesflhtwuhmvnegnehmlnwqxdvzrttgyonrczepbzfduvctjdmvzqudvqyulujjebibloobiyqurtcuhxsajurtdqsrrzlwafcuwzbvpdzlzsyqhgpjavhuigaepbgayiyppulpxpvojkpxzclewrfkwstaeykbwbcbhvtzvffvtbstnbuxpzxmvhzbkxjfrcwgzoeossckrajdjwefhccfesnrsqftetykjhpkvvlgzpcsnazqiwmngiasdstbkpeddnalmpmmxnrmoqsrvkxbtkqclwskdvegmnjrfdrecwpzrqasbcznjyjbrmfihofielvfsfavwtvsqxrejmloplmynyjzrkejpfukhxrtoaciljuskpggbnrgizvboayckucqctlncljnqnckvegvklucfdduwphbeoizrusmjnvzfvopticftwswovsjnzcbsucdaxgmubiajehqglfzneimfwwplqxhalolhjktxxrzbyuqwmzlqmccnusycmiuqdkboecqoymwiqhccwohtjyroflbslvrxwsxmkxtqnpqaydbramooxxebjbjeqasdossslohqxdeioxavkbkxaruhzxfshduljbumgvpofdcmuppjivxwcrdqrlaocqkviqsjnboidbrimlrqcdsnmfuidqquztnzbcudrvediphipxvvnckqpllynlahjlmeuscbdpxiunksxvijdjdchqmnadgyovgxyxxsillcdqgocsevhildaszkasckihtidfqalvyignwklhjlwxbfyrodzzqxqgftbqxplqubzvmtmqkbuiadfvusaqrbkdesnzrwcgtjkjuusjjxmgnstjmmbotdawmzqbootzsfuunrttygjljbmitarinwlrmalkvsvmrqhhfdxnpsnnzbavtvofsvuotbrzbjeskdrnpdrvgwcxwqreanccgywdxfcvbzjuvbacnajhkwyoxujbswmysndbybncvxcrhikxrkscxwzbxlttdgzbndyocfxblchshhsuemwmtweukjbrypbzjnvoexwuealvabyagazqvfmwnopiicawqfeafotnrzeootmjzfkhihrqqqzrhcjjtknyugdqamvhdusqsrjodaggbzxzbjcxvjikxwkvxmkntvbvneniuphvudfehqhgnkumpvgwttgwcsbwwdbhldtykubajpajopwlmgvcdpnpczyrwgsriqlbodmammhgwwjofcsnuyotbpdqpqmhnnganwcpnpqtojqlusgmpnugvvyookxtemewchtnyyhewmbgstavibdzrxkqjuxjdjwnvfhojdtmfyihyluvrjrtgulfizjeirclhkhyfmywmwetoqyisnfslryhdmwmyejaquwytpjuvpwsfkndewovithrsccigxobqrrwqothmctzykplqqyvntegkwafhdamokqqtmbuxzljokvojkggkpesjbggqmjyutefgriviquantataeglgjmvqyvuhcnbjyrnvagnjbemjycbwwncbkwgggqmzpdkihojmbvycxlliotbzmxenupvbnwcobyshoupynikpwbgxvytdxzwgkcpmmsuqhevwyazqccfnwaqvcsqqbeabtayrjpinosfhjsjxcwwintf\",
    \"excerpt\": \"lgqkcvevrgrzctnwrdmaersbjcvmviedpysvpvnioezywtlgjqkjmxndweybosscednudguuyxfwzfnpchqrajmhgnaulqfuyhahsftawshwjsoiawqdgwjbtwgfpzweueflgyrglydlblymxmlwweurxehlhzxqhipspfnvajiczohtcdvykaqwlkoefdosjihujiwfaddwpoogbeuvnnihmvkijfvjvyslqfxtnrxuqzpdmajfuybvuegfjcvoixdxibdxjdrclhotwmjkxwvshsgaubirfbnyqaofobhhqrbduopodulankaeocvtbkiupedjdbwvzmnlkdwhlmzuyuhwpmrogdyucrvjjfcxbcodcwovshgbkwalsgolccjqiurhshcnjbngdocijclezvlgoeexflmxjxwriyaoznuqowkuagugcjbdiunhkkfosjcwzrwvntijwaezjuaqleddhbubghswxbjjmnpgldxlejuqyjnoeczdloweanxvruqwjisardaxjqoqwcun\",
    \"excerpt_length\": 874
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/rounds/168"
);

const headers = {
    "Authorization": "Bearer {YOUR_AUTH_KEY}",
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "text": "lolpbummagjyvxtkiruuuxkfxudfrpgrswrdywxfmcyjvdmzdwxihudfutzllhhrryslopfffoaeuyuccfqpvimkvxdgjravrtswhojckosuozhdunifbjkkhaewhdgheefhmiitggiuqzmuslcocfxevwiqquxfwnusmdoiatkszxxbdsgwmibffxoscjdccojrgvljpcnqromzizwzmzpykuarjltqlywcfqzsklqogsiykvfqgmhiytcgdthxbjscqxecfpsvppdaitlszyncxnznpkgufqovsunuscyhjgfkrnajiojqzojyglqoavqxvhmbbohzfkzrfmrasqlmtwcpyeqwrfoywypfvthpmczforujxmvmnxkdcpydohrdkimpweopovwiyzaugzfhnapoqpgwmkiozbabfleioksmantqwcejtlhsoetcaohkgvvxoajhmuxprineaftwzbaknjpdbynocfeiiuyqfsohuqjvmzmurkwaryuhauslwqsyphmfgikvcvstirzuuwwbzrxdqelqcisxljjquylqdlduzojdxaihacpqsejunbvztwsijqmdxyydhgnlovzeualpsmfwbkngwftwrtnmkqmagnveounmiqxesflhtwuhmvnegnehmlnwqxdvzrttgyonrczepbzfduvctjdmvzqudvqyulujjebibloobiyqurtcuhxsajurtdqsrrzlwafcuwzbvpdzlzsyqhgpjavhuigaepbgayiyppulpxpvojkpxzclewrfkwstaeykbwbcbhvtzvffvtbstnbuxpzxmvhzbkxjfrcwgzoeossckrajdjwefhccfesnrsqftetykjhpkvvlgzpcsnazqiwmngiasdstbkpeddnalmpmmxnrmoqsrvkxbtkqclwskdvegmnjrfdrecwpzrqasbcznjyjbrmfihofielvfsfavwtvsqxrejmloplmynyjzrkejpfukhxrtoaciljuskpggbnrgizvboayckucqctlncljnqnckvegvklucfdduwphbeoizrusmjnvzfvopticftwswovsjnzcbsucdaxgmubiajehqglfzneimfwwplqxhalolhjktxxrzbyuqwmzlqmccnusycmiuqdkboecqoymwiqhccwohtjyroflbslvrxwsxmkxtqnpqaydbramooxxebjbjeqasdossslohqxdeioxavkbkxaruhzxfshduljbumgvpofdcmuppjivxwcrdqrlaocqkviqsjnboidbrimlrqcdsnmfuidqquztnzbcudrvediphipxvvnckqpllynlahjlmeuscbdpxiunksxvijdjdchqmnadgyovgxyxxsillcdqgocsevhildaszkasckihtidfqalvyignwklhjlwxbfyrodzzqxqgftbqxplqubzvmtmqkbuiadfvusaqrbkdesnzrwcgtjkjuusjjxmgnstjmmbotdawmzqbootzsfuunrttygjljbmitarinwlrmalkvsvmrqhhfdxnpsnnzbavtvofsvuotbrzbjeskdrnpdrvgwcxwqreanccgywdxfcvbzjuvbacnajhkwyoxujbswmysndbybncvxcrhikxrkscxwzbxlttdgzbndyocfxblchshhsuemwmtweukjbrypbzjnvoexwuealvabyagazqvfmwnopiicawqfeafotnrzeootmjzfkhihrqqqzrhcjjtknyugdqamvhdusqsrjodaggbzxzbjcxvjikxwkvxmkntvbvneniuphvudfehqhgnkumpvgwttgwcsbwwdbhldtykubajpajopwlmgvcdpnpczyrwgsriqlbodmammhgwwjofcsnuyotbpdqpqmhnnganwcpnpqtojqlusgmpnugvvyookxtemewchtnyyhewmbgstavibdzrxkqjuxjdjwnvfhojdtmfyihyluvrjrtgulfizjeirclhkhyfmywmwetoqyisnfslryhdmwmyejaquwytpjuvpwsfkndewovithrsccigxobqrrwqothmctzykplqqyvntegkwafhdamokqqtmbuxzljokvojkggkpesjbggqmjyutefgriviquantataeglgjmvqyvuhcnbjyrnvagnjbemjycbwwncbkwgggqmzpdkihojmbvycxlliotbzmxenupvbnwcobyshoupynikpwbgxvytdxzwgkcpmmsuqhevwyazqccfnwaqvcsqqbeabtayrjpinosfhjsjxcwwintf",
    "excerpt": "lgqkcvevrgrzctnwrdmaersbjcvmviedpysvpvnioezywtlgjqkjmxndweybosscednudguuyxfwzfnpchqrajmhgnaulqfuyhahsftawshwjsoiawqdgwjbtwgfpzweueflgyrglydlblymxmlwweurxehlhzxqhipspfnvajiczohtcdvykaqwlkoefdosjihujiwfaddwpoogbeuvnnihmvkijfvjvyslqfxtnrxuqzpdmajfuybvuegfjcvoixdxibdxjdrclhotwmjkxwvshsgaubirfbnyqaofobhhqrbduopodulankaeocvtbkiupedjdbwvzmnlkdwhlmzuyuhwpmrogdyucrvjjfcxbcodcwovshgbkwalsgolccjqiurhshcnjbngdocijclezvlgoeexflmxjxwriyaoznuqowkuagugcjbdiunhkkfosjcwzrwvntijwaezjuaqleddhbubghswxbjjmnpgldxlejuqyjnoeczdloweanxvruqwjisardaxjqoqwcun",
    "excerpt_length": 874
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-rounds--id-">
</span>
<span id="execution-results-PUTapi-rounds--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-rounds--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-rounds--id-"></code></pre>
</span>
<span id="execution-error-PUTapi-rounds--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-rounds--id-"></code></pre>
</span>
<form id="form-PUTapi-rounds--id-" data-method="PUT"
      data-path="api/rounds/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-rounds--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-rounds--id-"
                    onclick="tryItOut('PUTapi-rounds--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-rounds--id-"
                    onclick="cancelTryOut('PUTapi-rounds--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-rounds--id-" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/rounds/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/rounds/{id}</code></b>
        </p>
                <p>
            <label id="auth-PUTapi-rounds--id-" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="PUTapi-rounds--id-"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="id"
               data-endpoint="PUTapi-rounds--id-"
               value="168"
               data-component="url" hidden>
    <br>
<p>The ID of the round.</p>
            </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>text</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="text"
               data-endpoint="PUTapi-rounds--id-"
               value="lolpbummagjyvxtkiruuuxkfxudfrpgrswrdywxfmcyjvdmzdwxihudfutzllhhrryslopfffoaeuyuccfqpvimkvxdgjravrtswhojckosuozhdunifbjkkhaewhdgheefhmiitggiuqzmuslcocfxevwiqquxfwnusmdoiatkszxxbdsgwmibffxoscjdccojrgvljpcnqromzizwzmzpykuarjltqlywcfqzsklqogsiykvfqgmhiytcgdthxbjscqxecfpsvppdaitlszyncxnznpkgufqovsunuscyhjgfkrnajiojqzojyglqoavqxvhmbbohzfkzrfmrasqlmtwcpyeqwrfoywypfvthpmczforujxmvmnxkdcpydohrdkimpweopovwiyzaugzfhnapoqpgwmkiozbabfleioksmantqwcejtlhsoetcaohkgvvxoajhmuxprineaftwzbaknjpdbynocfeiiuyqfsohuqjvmzmurkwaryuhauslwqsyphmfgikvcvstirzuuwwbzrxdqelqcisxljjquylqdlduzojdxaihacpqsejunbvztwsijqmdxyydhgnlovzeualpsmfwbkngwftwrtnmkqmagnveounmiqxesflhtwuhmvnegnehmlnwqxdvzrttgyonrczepbzfduvctjdmvzqudvqyulujjebibloobiyqurtcuhxsajurtdqsrrzlwafcuwzbvpdzlzsyqhgpjavhuigaepbgayiyppulpxpvojkpxzclewrfkwstaeykbwbcbhvtzvffvtbstnbuxpzxmvhzbkxjfrcwgzoeossckrajdjwefhccfesnrsqftetykjhpkvvlgzpcsnazqiwmngiasdstbkpeddnalmpmmxnrmoqsrvkxbtkqclwskdvegmnjrfdrecwpzrqasbcznjyjbrmfihofielvfsfavwtvsqxrejmloplmynyjzrkejpfukhxrtoaciljuskpggbnrgizvboayckucqctlncljnqnckvegvklucfdduwphbeoizrusmjnvzfvopticftwswovsjnzcbsucdaxgmubiajehqglfzneimfwwplqxhalolhjktxxrzbyuqwmzlqmccnusycmiuqdkboecqoymwiqhccwohtjyroflbslvrxwsxmkxtqnpqaydbramooxxebjbjeqasdossslohqxdeioxavkbkxaruhzxfshduljbumgvpofdcmuppjivxwcrdqrlaocqkviqsjnboidbrimlrqcdsnmfuidqquztnzbcudrvediphipxvvnckqpllynlahjlmeuscbdpxiunksxvijdjdchqmnadgyovgxyxxsillcdqgocsevhildaszkasckihtidfqalvyignwklhjlwxbfyrodzzqxqgftbqxplqubzvmtmqkbuiadfvusaqrbkdesnzrwcgtjkjuusjjxmgnstjmmbotdawmzqbootzsfuunrttygjljbmitarinwlrmalkvsvmrqhhfdxnpsnnzbavtvofsvuotbrzbjeskdrnpdrvgwcxwqreanccgywdxfcvbzjuvbacnajhkwyoxujbswmysndbybncvxcrhikxrkscxwzbxlttdgzbndyocfxblchshhsuemwmtweukjbrypbzjnvoexwuealvabyagazqvfmwnopiicawqfeafotnrzeootmjzfkhihrqqqzrhcjjtknyugdqamvhdusqsrjodaggbzxzbjcxvjikxwkvxmkntvbvneniuphvudfehqhgnkumpvgwttgwcsbwwdbhldtykubajpajopwlmgvcdpnpczyrwgsriqlbodmammhgwwjofcsnuyotbpdqpqmhnnganwcpnpqtojqlusgmpnugvvyookxtemewchtnyyhewmbgstavibdzrxkqjuxjdjwnvfhojdtmfyihyluvrjrtgulfizjeirclhkhyfmywmwetoqyisnfslryhdmwmyejaquwytpjuvpwsfkndewovithrsccigxobqrrwqothmctzykplqqyvntegkwafhdamokqqtmbuxzljokvojkggkpesjbggqmjyutefgriviquantataeglgjmvqyvuhcnbjyrnvagnjbemjycbwwncbkwgggqmzpdkihojmbvycxlliotbzmxenupvbnwcobyshoupynikpwbgxvytdxzwgkcpmmsuqhevwyazqccfnwaqvcsqqbeabtayrjpinosfhjsjxcwwintf"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 65000 characters.</p>
        </p>
                <p>
            <b><code>excerpt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text"
               name="excerpt"
               data-endpoint="PUTapi-rounds--id-"
               value="lgqkcvevrgrzctnwrdmaersbjcvmviedpysvpvnioezywtlgjqkjmxndweybosscednudguuyxfwzfnpchqrajmhgnaulqfuyhahsftawshwjsoiawqdgwjbtwgfpzweueflgyrglydlblymxmlwweurxehlhzxqhipspfnvajiczohtcdvykaqwlkoefdosjihujiwfaddwpoogbeuvnnihmvkijfvjvyslqfxtnrxuqzpdmajfuybvuegfjcvoixdxibdxjdrclhotwmjkxwvshsgaubirfbnyqaofobhhqrbduopodulankaeocvtbkiupedjdbwvzmnlkdwhlmzuyuhwpmrogdyucrvjjfcxbcodcwovshgbkwalsgolccjqiurhshcnjbngdocijclezvlgoeexflmxjxwriyaoznuqowkuagugcjbdiunhkkfosjcwzrwvntijwaezjuaqleddhbubghswxbjjmnpgldxlejuqyjnoeczdloweanxvruqwjisardaxjqoqwcun"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 1000 characters.</p>
        </p>
                <p>
            <b><code>excerpt_length</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number"
               name="excerpt_length"
               data-endpoint="PUTapi-rounds--id-"
               value="874"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 1000.</p>
        </p>
        </form>

                    <h2 id="rounds-GETapi-games--game_id--rounds-create">Show the form for creating a new resource.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-games--game_id--rounds-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/games/110/rounds/create" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/games/110/rounds/create"
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

<span id="example-responses-GETapi-games--game_id--rounds-create">
    </span>
<span id="execution-results-GETapi-games--game_id--rounds-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-games--game_id--rounds-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-games--game_id--rounds-create"></code></pre>
</span>
<span id="execution-error-GETapi-games--game_id--rounds-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-games--game_id--rounds-create"></code></pre>
</span>
<form id="form-GETapi-games--game_id--rounds-create" data-method="GET"
      data-path="api/games/{game_id}/rounds/create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-games--game_id--rounds-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-games--game_id--rounds-create"
                    onclick="tryItOut('GETapi-games--game_id--rounds-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-games--game_id--rounds-create"
                    onclick="cancelTryOut('GETapi-games--game_id--rounds-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-games--game_id--rounds-create" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/games/{game_id}/rounds/create</code></b>
        </p>
                <p>
            <label id="auth-GETapi-games--game_id--rounds-create" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-games--game_id--rounds-create"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>game_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="game_id"
               data-endpoint="GETapi-games--game_id--rounds-create"
               value="110"
               data-component="url" hidden>
    <br>
<p>The ID of the game.</p>
            </p>
                    </form>

                    <h2 id="rounds-POSTapi-rounds--round_id--publish">POST api/rounds/{round_id}/publish</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTapi-rounds--round_id--publish">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/rounds/168/publish" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/rounds/168/publish"
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

<span id="example-responses-POSTapi-rounds--round_id--publish">
</span>
<span id="execution-results-POSTapi-rounds--round_id--publish" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-rounds--round_id--publish"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-rounds--round_id--publish"></code></pre>
</span>
<span id="execution-error-POSTapi-rounds--round_id--publish" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-rounds--round_id--publish"></code></pre>
</span>
<form id="form-POSTapi-rounds--round_id--publish" data-method="POST"
      data-path="api/rounds/{round_id}/publish"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-rounds--round_id--publish', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-rounds--round_id--publish"
                    onclick="tryItOut('POSTapi-rounds--round_id--publish');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-rounds--round_id--publish"
                    onclick="cancelTryOut('POSTapi-rounds--round_id--publish');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-rounds--round_id--publish" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/rounds/{round_id}/publish</code></b>
        </p>
                <p>
            <label id="auth-POSTapi-rounds--round_id--publish" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="POSTapi-rounds--round_id--publish"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>round_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="round_id"
               data-endpoint="POSTapi-rounds--round_id--publish"
               value="168"
               data-component="url" hidden>
    <br>
<p>The ID of the round.</p>
            </p>
                    </form>

                    <h2 id="rounds-GETapi-games--game_id--rounds-next">GET api/games/{game_id}/rounds/next</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETapi-games--game_id--rounds-next">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/games/110/rounds/next" \
    --header "Authorization: Bearer {YOUR_AUTH_KEY}" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/games/110/rounds/next"
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

<span id="example-responses-GETapi-games--game_id--rounds-next">
    </span>
<span id="execution-results-GETapi-games--game_id--rounds-next" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-games--game_id--rounds-next"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-games--game_id--rounds-next"></code></pre>
</span>
<span id="execution-error-GETapi-games--game_id--rounds-next" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-games--game_id--rounds-next"></code></pre>
</span>
<form id="form-GETapi-games--game_id--rounds-next" data-method="GET"
      data-path="api/games/{game_id}/rounds/next"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Authorization":"Bearer {YOUR_AUTH_KEY}","Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-games--game_id--rounds-next', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-games--game_id--rounds-next"
                    onclick="tryItOut('GETapi-games--game_id--rounds-next');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-games--game_id--rounds-next"
                    onclick="cancelTryOut('GETapi-games--game_id--rounds-next');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-games--game_id--rounds-next" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/games/{game_id}/rounds/next</code></b>
        </p>
                <p>
            <label id="auth-GETapi-games--game_id--rounds-next" hidden>Authorization header:
                <b><code>Bearer </code></b>
                <input type="text"
                       name="Authorization"
                       data-prefix="Bearer "
                       data-endpoint="GETapi-games--game_id--rounds-next"
                       data-component="header"></label>
        </p>
                <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <p>
                <b><code>game_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number"
               name="game_id"
               data-endpoint="GETapi-games--game_id--rounds-next"
               value="110"
               data-component="url" hidden>
    <br>
<p>The ID of the game.</p>
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
