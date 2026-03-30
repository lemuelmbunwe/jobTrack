<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applications</title>
</head>
<body>
    <form action="/applications" method="POST">
        @csrf
        <input type="text" name="company" placeholder="Company">
        <input type="text" name="role" placeholder="Junior Dev">
        <input type="date" name="applied_at">
        
        <select name="status" id="choice" required>
            <option value="" disabled selected>-- Select one --</option>
            <option value="applied">Applied</option>
            <option value="interview">Interview</option>
            <option value="offer">Offer</option>
            <option value="rejected">Rejected</option>
        </select>
        <textarea name="notes" id="notes" rows="4" cols="50" placeholder="Enter your notes here...">Notes</textarea>
        
        <button type="summit">Submit</button>
        
    
    </form>
</body>
</html>