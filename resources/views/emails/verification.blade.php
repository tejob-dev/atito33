<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email De Verification</title>
</head>
<body style="margin:0;padding:0;background-color:#ffffff;">
    <div style="width:100%;margin:0 auto;font-family:Sans-Serif">
        <div style="height:40px;background-color:#3270FC;color:white;padding:8px 16px">
            <h1 style="margin:0;color:#ffffff;font-size:2em">ATITO</h1>
        </div>

        <div style="background-color:#fafafa;margin:0;padding:24px">
            <div style="word-wrap:break-word;width:100%">
                <p>Bonjour {{ $name }},</p>
                <p>Cliquez sur ce lien pour valider votre adresse e-mail.</p>
                <p><a style="color:#75cafb;" href="{{ $link }}">{{ $link }}</a></p>
                <p>Si vous n'avez pas demandé á valider cette adresse, vous pouvez ignorer cet e-mail.</p>
                <p>Merci,</p>
                <p>Votre équipe atito.net</p>
            </div>
        </div>
    </div>
</body>
</html>
