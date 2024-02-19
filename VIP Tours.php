<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Dancing+Script:wght@700&family=Great+Vibes&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Tabs</title>
</head>
<body>
<div class="container" id="Dashboardcontainer">
    <header id="Mobile-Menu">
        <button id="menu-toggle">=</button>
    </header>
<div class="side-menu" id="side-menu">
        <div class="brand-name">
            <h1>Admin Dashboard</h1>
        </div>
        <ul class="side-menu-title">
            <li onclick="window.location.href='London Tours.php'"><a><h4>London Tours</h4></a></li>
            <li onclick="window.location.href='Day Tours From London.php'"><a><h4>Day Tours From London</h4></a></li>
            <li onclick="window.location.href='VIP Tours.php'"><a><h4>VIP Tours</h4></a></li>
            <li onclick="window.location.href='Overnight Tours.php'"><a><h4>Overnight Tours</h4></a></li>
        </ul>
        <button id="menu-close">&times;</button>
    </div>
       <div class="header">
            <h1>VIP Tours </h1>
        </div> 
        <!-- VIP Tours Content start from here -->
    <div class="content">
            <div class="cards">    
     <div id="content3">
        <div class="MainContainer" id="Create">
            <div class="ListTab">
                <div class="Tabs">
                    <div class="TourTitle">
                        <h2>Wanna Create new VIP Tour?</h2>
                    </div>
                    <div class="TourButton">
                        <button onclick="showForm()" id="CreateButton">Create</button>
                    </div>
            
            </div>
            </div>
        </div>
</div>
</div>

        <?php
    include('connection.php');
    $sql1 = "SELECT * FROM tours WHERE Tour_Type = 'VIP Tours'";
    $result1 = mysqli_query($conn, $sql1);
    while($row = mysqli_fetch_assoc($result1))
    {
        echo "<div class='MainContainer'>
        <div class='ListTab'>
            <div class='Tabs'>
                <div class='TourTitle'>
                    <h2>". $row['Title']. "</h2>
                </div>
                <div class='TourButton'>
                    <button id='UpdateButton' onclick='showUpdateForm(
                        " . json_encode($row['id']) . ",
                        " . json_encode($row['Title']) . ",
                        " . json_encode($row['Tour_Description']) . ",
                        " . json_encode($row['Transport']) . ",
                        " . json_encode($row['Duration']) . ",
                        " . json_encode($row['Price']) . "
                    )'>Update</button>
                    <button id='DeleteButton' onclick='location.href=\"Delete VIP Tours.php?id=" . $row['id'] . "\"'>Delete</button>
                </div>
            </div>
        </div>
    </div>";
    }
    ?>
    </div>
</div>
    <!-- Html for form start here -->
    <div id="myForm">
        <span class="closeButton" onclick="closeForm()">&#10006;</span>
    <form action="VIP Tours.php" method="POST" enctype="multipart/form-data">
        <h4>Create New VIP Tour</h4>
        <label for="title"> Tour Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description"> Description:</label>
        <textarea type="description" id="description" name="description" required></textarea>

        <label for="transport">Transport:</label>
        <select id="transport" name="transport" required>
            <option value="Car">Car</option>
            <option value="Minibus">Minibus</option>
            <option value="Private car/minibus">Private car/minibus</option>
            <option value="Car">Walk</option>
            <option value="Car">Train</option>
        </select>

        <label for="duration">Duration:</label>
        <select id="duration" name="duration" onchange="updatePrices()" required>
            <!-- Add options for hours -->
            <option value="5">5 Hours</option>
             <option value="8">8 Hours</option>
            <option value="12">12 Hours</option>
        </select>
        <!-- Option 1 -->
        <div class="formDiv">
                <div class="Div1">
        
            <div class="CarCompanyTitle">
            <label for="carCompany1">Deluxe:</label>
        <div>
            <input type="text" id="price1" name="price1" readonly>
        </div>
        </div>
        </div>
        <!-- Option 2 -->
        <div class="Div2">
        
            <div class="CarCompanyTitle">
            <label for="carCompany2">XL:</label>
            
            <div>
            <input type="text" id="price2" name="price2" readonly>
        </div>
        </div>
        </div>
        </div>
        <!-- Option 3 -->
        <div class="formDiv">
                <div class="Div1">
        
            <div class="CarCompanyTitle">
            <label for="carCompany3">V-Class:</label>
            <div>
            <input type="text" id="price3" name="price3" readonly>
        </div>
        </div>
        </div>
        <!-- Option 4 -->
        <div class="Div2">
        
            <div class="CarCompanyTitle">
            <label for="carCompany4">Minibus:</label>
            <div>
            <input type="text" id="price4" name="price4" readonly>
        </div>
        </div>
        </div>
        </div>
        <div class="DivForImage">
            <div class="UploadImage">
        <label for="image">Upload Image:</label>
       
        <input type="file" id="image" name="image" accept="image/*" required onchange="previewImage()"> </div>
        <div id="imagePreview"></div>
        </div>
        <button type="submit" id="FormSubmitButton">Create</button>
    </form>
</div>

<!-- Html for form start here -->
<div id="myUpdateForm">
        <span class="closeButton" onclick="closeUpdateForm()">&#10006;</span>
    <form action="VIP Tours.php" method="POST">
        <h4>Update London Tour</h4>
        <label for="db-id"> Tour ID:</label>
        <input type="text" id="db-id" name="db-id" readonly>
        <label for="db-title"> Tour Title:</label>
        <input type="text" id="db-title" name="db-title" required>
        <label for="db-description"> Description:</label>
        <textarea type="description" id="db-description" name="db-description" required></textarea>

        <label for="db-transport">Transport:</label>
        <select id="db-transport" name="db-transport" required>
            <option value="Car">Car</option>
            <option value="Minibus">Minibus</option>
            <option value="Private car/minibus">Private car/minibus</option>
            <option value="Walk">Walk</option>
            <option value="Train">Train</option>
        </select>

        <label for="db-duration">Duration:</label>
        <select id="db-duration" name="db-duration" onchange="updatePricesFromDatabase()" required>
            <!-- Add options for hours -->
            <option value="5">5 Hours</option>
             <option value="8">8 Hours</option>
            <option value="12">12 Hours</option>
        </select>
         <!-- Option 1 -->
         <div class="formDiv">
                <div class="Div1">
        
            <div class="CarCompanyTitle">
            <label for="carCompany1">Deluxe:</label>
        <div>
            <input type="text" id="db-price1" name="db-price1" readonly>
        </div>
        </div>
        </div>
        <!-- Option 2 -->
        <div class="Div2">
        
            <div class="CarCompanyTitle">
            <label for="carCompany2">XL:</label>
            
            <div>
            <input type="text" id="price2" name="price2" readonly>
        </div>
        </div>
        </div>
        </div>
        <!-- Option 3 -->
        <div class="formDiv">
                <div class="Div1">
        
            <div class="CarCompanyTitle">
            <label for="carCompany3">V-Class:</label>
            <div>
            <input type="text" id="price3" name="price3" readonly>
        </div>
        </div>
        </div>
        <!-- Option 4 -->
        <div class="Div2">
        
            <div class="CarCompanyTitle">
            <label for="carCompany4">Minibus:</label>
            <div>
            <input type="text" id="price4" name="price4" readonly>
        </div>
        </div>
        </div>
        </div>
        <button type="submit" id="UpdateSubmitButton">Update</button>
    </form>
</div>



<script>
    function showContent(contentId) {
            // Hide all content divs
            document.getElementById('content1').style.display = 'none';
            document.getElementById('content2').style.display = 'none';
            document.getElementById('content3').style.display = 'none';
            document.getElementById('content4').style.display = 'none';


            // Show the selected content div
            document.getElementById(contentId).style.display = 'block';
        }
    // Form JavaScript Start from here
    // Function to show the form
    function showForm() {
        document.getElementById('myForm').style.display = 'block';
    }
    function showUpdateForm(tourId, title, description, transport, duration, price)
    {
        document.getElementById('myUpdateForm').style.display = 'block';
        document.getElementById('db-id').value = tourId;
        document.getElementById('db-title').value = title;
        document.getElementById('db-description').value = description;
        document.getElementById('db-transport').value = transport;
        document.getElementById('db-duration').value = duration;
        document.getElementById('db-price1').value = price;

    }

    // Function to close the form
    function closeForm() {
        document.getElementById('myForm').style.display = 'none';
    }
    function closeUpdateForm()
    {
        document.getElementById('myUpdateForm').style.display = 'none';
    }
     // update Prices From Database 
     function updatePricesFromDatabase()
    {
        var selectedHours = document.getElementById('db-duration').value;

       
        var priceOption1 = selectedHours * 20 * 1;
        var priceOption2 = selectedHours * 20 * 1.5;
        var priceOption3 = selectedHours * 20 * 2;
        var priceOption4 = selectedHours * 20 * 3;


        var formattedPrice1 = new Intl.NumberFormat('en-GB', {
                style: 'currency',
                currency: 'GBP'
            }).format(priceOption1);

        var formattedPrice2 = new Intl.NumberFormat('en-GB', {
                style: 'currency',
                currency: 'GBP'
            }).format(priceOption2);

        var formattedPrice3 = new Intl.NumberFormat('en-GB', {
                style: 'currency',
                currency: 'GBP'
            }).format(priceOption3);

        var formattedPrice4 = new Intl.NumberFormat('en-GB', {
                style: 'currency',
                currency: 'GBP'
            }).format(priceOption4);
            
        document.getElementById('db-price1').value = formattedPrice1;
        document.getElementById('price2').value = formattedPrice2;
        document.getElementById('price3').value = formattedPrice3;
        document.getElementById('price4').value = formattedPrice4;
        console.log(document.getElementById('price1').value);
     }
    
    // Function to update the price based on selected hours
    function updatePrices() {
            var selectedHours = document.getElementById('duration').value;

            // Assuming the rate is 20 British Pounds per hour
            // var baseRate = 20;

            // Calculate prices for different options
            var priceOption1 = selectedHours * 20 * 1;
            var priceOption2 = selectedHours * 20 * 1.5;
            var priceOption3 = selectedHours * 20 * 2;
            var priceOption4 = selectedHours * 20 * 3;

            // Format prices as British Pound currency
            var formattedPrice1 = new Intl.NumberFormat('en-GB', {
                style: 'currency',
                currency: 'GBP'
            }).format(priceOption1);

            var formattedPrice2 = new Intl.NumberFormat('en-GB', {
                style: 'currency',
                currency: 'GBP'
            }).format(priceOption2);

            var formattedPrice3 = new Intl.NumberFormat('en-GB', {
                style: 'currency',
                currency: 'GBP'
            }).format(priceOption3);

            var formattedPrice4 = new Intl.NumberFormat('en-GB', {
                style: 'currency',
                currency: 'GBP'
            }).format(priceOption4);

            // Update input fields with formatted prices
            document.getElementById('price1').value = formattedPrice1;
            document.getElementById('price2').value = formattedPrice2;
            document.getElementById('price3').value = formattedPrice3;
            document.getElementById('price4').value = formattedPrice4;
        }

    // Function to preview the selected image
    function previewImage() {
            var input = document.getElementById('image');
            var previewContainer = document.getElementById('imagePreview');
            var previewImage = document.createElement('img');

            // Remove previous preview (if any)
            while (previewContainer.firstChild) {
                previewContainer.removeChild(previewContainer.firstChild);
            }

            // Check if a file is selected
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.appendChild(previewImage);
                };

                // Read the image file as a data URL
                reader.readAsDataURL(input.files[0]);
            } else {
                // Display a default message if no file is selected
                var defaultText = document.createTextNode('No image selected');
                previewContainer.appendChild(defaultText);
            }
        }
        // sidebar mobile Js
            document.addEventListener('DOMContentLoaded', function () {
        var menuToggle = document.getElementById('menu-toggle');
        var menuClose = document.getElementById('menu-close');
        var sideMenu = document.getElementById('side-menu');

        // Function to show the side menu
        function showMenu() {
            sideMenu.style.transform = 'translateX(0)';
            sideMenu.classList.add('show-menu');
        }

        // Function to hide the side menu
        function hideMenu() {
            sideMenu.style.transform = 'translateX(-384px)';
            sideMenu.classList.remove('show-menu');
        }

        // Toggle the side menu on click
        menuToggle.addEventListener('click', function () {
            if (sideMenu.classList.contains('show-menu')) {
                hideMenu();
            } else {
                showMenu();
            }
        });

        // Hide the side menu when the close button is clicked
        menuClose.addEventListener('click', function () {
            hideMenu();
        });

        // Hide the side menu initially on screens smaller than or equal to 768px
        if (window.innerWidth <= 768) {
            hideMenu();
        }

        // Show the side menu when the window is resized to be larger than 768px
        window.addEventListener('resize', function () {
            if (window.innerWidth > 768) {
                showMenu();
            } else {
                hideMenu();
            }
        });
    });


document.addEventListener('DOMContentLoaded', function () {
    var listItems = document.querySelectorAll('.side-menu-title li');

    // Function to handle item click
    function handleItemClick() {
        var targetPage = this.getAttribute('onclick');
        localStorage.setItem('activePage', targetPage);

        listItems.forEach(function (li) {
            li.classList.remove('active');
        });
        this.classList.add('active');
    }

    // Add click event listener to each list item
    listItems.forEach(function (item) {
        item.addEventListener('click', handleItemClick);
    });

    // Retrieve the active page from local storage
    var activePage = localStorage.getItem('activePage');
    if (activePage) {
        listItems.forEach(function (li) {
            if (li.getAttribute('onclick') === activePage) {
                li.classList.add('active');
            }
        });
    }
});

</script>
        
</body>
</html>
<?php
include ('connection.php');
if(isset($_POST['title']) || isset($_POST['description']) || isset($_POST['transport']) || isset($_POST['duration']) || isset($_POST['price1']) || isset($_FILES['image']))
{
    $title= $_POST['title'];
    $description= $_POST['description'];
    $transport= $_POST['transport'];
    $duration= $_POST['duration'];
    $price = $_POST['price1'];
    $type = "VIP Tours";
    $image = file_get_contents($_FILES['image']['tmp_name']);
    // Check if the file was uploaded successfully
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK)
    {
        $image = file_get_contents($_FILES['image']['tmp_name']);
        $sqlQuery = "INSERT INTO tours (Title, Tour_Description, Transport, Duration, Price, Tour_Type, Tour_Image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sqlQuery);
        $stmt->bind_param('sssssss', $title, $description, $transport, $duration, $price, $type, $image);

        if ($stmt->execute())
        {
            echo "<script>alert('VIP Tour has been created successfully!')</script>";
            echo '<script>window.location.href="VIP Tours.php"</script>';

        }
        else
        {
            echo '<script>alert("Error: ' . $stmt->error . '");</script>';
        }

        // Close the prepared statement
        $stmt->close();
    }
    else
    {
        echo '<script>alert("File upload failed!");</script>';
    }
    
}
else if(isset($_POST['db-title']) || isset($_POST['db-description']) || isset($_POST['db-transport']) || isset($_POST['db-duration']) || isset($_POST['db-price1']))
{
    $title= $_POST['db-title'];
    $description= $_POST['db-description'];
    $transport= $_POST['db-transport'];
    $duration= $_POST['db-duration'];
    $price = $_POST['db-price1'];
    $type = "VIP Tours";
    $id= $_POST['db-id'];
    $sqlQuery = "UPDATE tours SET Title='$title', Tour_Description='$description', Transport='$transport', Duration='$duration', Price='$price' WHERE id='$id' and Tour_Type='$type'";
    if($conn->query($sqlQuery))
    {
        echo '<script>alert("Tour Updated Successfully!")</script>';
        echo '<script>window.location.href="VIP Tours.php"</script>';
    }
    else
    {
        echo '<script>console.log("Error!")</script>';
    }
}
?>