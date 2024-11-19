<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caregiver Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h2>Caregiver Homepage</h2>
        <form action="caregiver" method="post">
            <div class="container-sm card-header bg-secondary text-white" style="display: table; padding: 10px;">
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="morning_med">
                    <label for="morning_med">Morning Medicine</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="afternoon_med">
                    <label for="afternoon_med">Afternoon Medicine</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="night_med">
                    <label for="night_med">Night Medicine</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="breakfast">
                    <label for="breakfast">Breakfast</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="lunch">
                    <label for="lunch">Lunch</label>
                </div>
                <div style="vertical-align: top; display: table-cell; text-align: center;">
                    <input type="checkbox" id="dinner">
                    <label for="dinner">Dinner</label>
                </div>
            </div>
            <a href="" class="btn approve btn-primary success-bg-subtle" style="margin-left: 10px; margin-bottom: 10px; margin-top: 3%;">Confirm</a>
            <a href="" class="btn approve btn-primary success-bg-subtle" style="margin-left: 10px; margin-bottom: 10px; margin-top: 3%;">Clear</a>
        </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>