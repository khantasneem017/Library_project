<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../style/stylesheet.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body>
    <div class="bg-img">
        <div class="content">
            <header>Feedback Form</header>
            <form action="#">
                <div class="field">
                    <h5>What kind of comment would you like to send?</h5>
                    <label for="myradioId" class="radio">
                        <input type="radio" name="feedback" id="myradioId" class="radio-input" value="suggestion">
                        <div class="radio-radiobtn">
                            <!-- virtual element-->
                        </div>
                        Suggestion
                    </label><br>
                    <label for="myradioId1" class="radio">
                        <input type="radio" name="feedback" id="myradioId1" class="radio-input" value="problem">
                        <div class="radio-radiobtn">
                            <!-- virtual element-->
                        </div>
                        Problem
                    </label><br>
                    <label for="myradioId2" class="radio">
                        <input type="radio" name="feedback" id="myradioId2" class="radio-input" value="complaint">
                        <div class="radio-radiobtn">
                            <!-- virtual element-->
                        </div>
                        Complaint
                    </label><br>
                    <label for="myradioId3" class="radio">
                        <input type="radio" name="feedback" id="myradioId3" class="radio-input" value="praise">
                        <div class="radio-radiobtn">
                            <!-- virtual element-->
                        </div>
                        Praise
                    </label><br>
                </div>
                <div class="form-row textarea">
                    <div class="input-data">
                        <textarea col="30" row= "10"></textarea>
                        <label>Give your feedback</label>
                    </div>
                </div>
                <div class="form-row">
                    <div class="input-data" required>
                        <input type="text">
                        <label>First Name</label>
                    </div>
                    <div class="input-data" required>
                        <input type="text">
                        <label>Last Name</label>
                    </div>
                    <div class="input-data">
                        <input type="text">
                        <label>E-mail</label>
                    </div>
                    <div class="input-data">
                        <input type="text">
                        <label>Phone No.</label>
                    </div>
                    <div class="form-row submit-button">
                        <div class="input-data">
                            <div class="inner"></div>
                            <input type="submit" value="submit">
                        </div>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
   
</body>
</html>