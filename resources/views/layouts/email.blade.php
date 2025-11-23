{{-- resources/views/layouts/email.blade.php --}}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.5; color: #333333; margin: 0; padding: 0;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color: #f7f7f7;">
        <tr>
            <td align="center">
                <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px;">
                    <tr>
                        <td align="center" style="padding: 20px;">
                            {{-- Email Header/Logo --}}
                            <h1 style="color: #6b46c1; font-size: 24px; margin: 0;">Gig Connector</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px; border-top: 1px solid #eeeeee;">
                            {{-- Content Slot --}}
                            {{ $slot }}
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 20px; font-size: 12px; color: #aaaaaa; border-top: 1px solid #eeeeee;">
                            &copy; {{ date('Y') }} Gig Connector. All rights reserved.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>