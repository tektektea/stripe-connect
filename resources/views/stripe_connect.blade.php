<html>
<head>

</head>
<body>

if (isset($_GET['code'])) {
$code = $_GET['code'];

$token_request_body = array(
'grant_type' => 'authorization_code',
'client_id' => 'ca_AX7HVCzKfIiFZ7f3Q78WcxJUZdl1prac',
'code' => $code,
'client_secret' => 'sk_test_cvXly1IolgMGL647Lmfzoi0N'
);

$req = curl_init(TOKEN_URI);
curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
curl_setopt($req, CURLOPT_POST, true );
curl_setopt($req, CURLOPT_POSTFIELDS, http_build_query($token_request_body));

$respCode = curl_getinfo($req, CURLINFO_HTTP_CODE);
$resp = json_decode(curl_exec($req), true);
curl_close($req);

echo $resp['access_token'];
} else if (isset($_GET['error'])) { // Error
echo $_GET['error_description'];
} else { // Show OAuth link
$authorize_request_body = array(
'response_type' => 'code',
'scope' => 'read_write',
'client_id' => 'ca_AX7HVCzKfIiFZ7f3Q78WcxJUZdl1prac'
);

$url = AUTHORIZE_URI . '?' . http_build_query($authorize_request_body);
echo "<a href='$url'>Connect with Stripe</a>";
}
</body>
</html>