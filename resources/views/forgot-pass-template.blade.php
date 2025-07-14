<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Password Reset Request</title>
  <style>
    /* Reset some default styles */
    body {
      margin: 0; padding: 0; background-color: #f5f7fa; font-family: Arial, sans-serif; color: #333;
    }
    table {
      border-collapse: collapse;
    }
    .email-container {
      max-width: 600px;
      margin: 40px auto;
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      overflow: hidden;
      border: 1px solid #e2e8f0;
    }
    .header {
      background-color: #2563eb; /* Blue */
      color: white;
      padding: 24px 30px;
      text-align: center;
    }
    .header h1 {
      margin: 0;
      font-size: 24px;
      font-weight: 700;
    }
    .content {
      padding: 30px;
      font-size: 16px;
      line-height: 1.5;
      color: #555;
    }
    .content h3 {
      color: #111827;
      margin-top: 0;
      font-weight: 600;
      font-size: 20px;
    }
    .btn {
      display: inline-block;
      margin: 20px 0 10px;
      padding: 14px 24px;
      background-color: #2563eb;
      color: white !important;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      border-radius: 6px;
    }
    .footer {
      font-size: 14px;
      color: #9ca3af;
      padding: 20px 30px;
      text-align: center;
    }
    @media screen and (max-width: 480px) {
      .email-container {
        width: 90% !important;
        margin: 20px auto !important;
      }
      .content, .header, .footer {
        padding: 20px !important;
      }
      .btn {
        width: 100% !important;
        box-sizing: border-box;
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <table width="100%" bgcolor="#f5f7fa" cellpadding="0" cellspacing="0">
    <tr>
      <td>
        <table class="email-container" align="center" cellpadding="0" cellspacing="0" role="presentation">
          <tr>
            <td class="header">
              <h1>We got your request</h1>
            </td>
          </tr>
          <tr>
            <td class="content">
              <h3>You can now reset your password!</h3>
              <p>You requested to reset your password. Click the button below to set a new password:</p>
              <p style="text-align:center;">
                <a href="{{ $resetUrl }}" class="btn" target="_blank" rel="noopener">Reset Password</a>
              </p>
              <p>If you did not request this, you can safely ignore this email.</p>
            </td>
          </tr>
          <tr>
            <td class="footer">
              &copy; {{ date('Y') }} Askly. All rights reserved.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>