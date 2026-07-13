<!DOCTYPE html>
<html>
<body style="font-family: sans-serif; color: #172033;">
    <h2 style="font-family: serif; color: #07172f;">New Website Enquiry</h2>

    <table cellpadding="6" cellspacing="0">
        <tr>
            <td><strong>Name</strong></td>
            <td>{{ $enquiry->name }}</td>
        </tr>
        <tr>
            <td><strong>Email</strong></td>
            <td>{{ $enquiry->email }}</td>
        </tr>
        <tr>
            <td><strong>Enquiry Type</strong></td>
            <td>{{ $enquiry->enquiry_type }}</td>
        </tr>
        @if ($enquiry->organisation)
        <tr>
            <td><strong>Organisation</strong></td>
            <td>{{ $enquiry->organisation }}</td>
        </tr>
        @endif
        <tr>
            <td><strong>Submitted</strong></td>
            <td>{{ $enquiry->created_at->format('d M Y, H:i') }}</td>
        </tr>
    </table>

    <p><strong>Message</strong></p>
    <p style="white-space: pre-wrap;">{{ $enquiry->message }}</p>
</body>
</html>
