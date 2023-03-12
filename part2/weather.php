<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>part 2</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
   
</head>

<body >
    
<br>
    <section style="margin-top: 50px;border-radius: 10px;" class="container p-5 d-flex justify-content-center align-items-center">
    <div style="width:80%" class="shadow-lg p-5">   
    <h1 class="text-center p-5" style="color: orange;">Weather Forcase For Our Cites in Egypt</h1>
      
    <form method="post" action="index.php">
            <select  class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="city">
                <option selected>Select Your City...</option>
                <?php
                foreach ($egyptCities as $city){
                    echo '<option value=' . $city['id'] . '>' . $city['country'] . ' ->' . $city['name'] . '</option>';
                  }
                ?>
            </select>
            <br><br><br><br><br><input id="submit" class="btn" name="submit" type="submit" value="Get Weather" style="border-radius: 10px;background-color: orange;justify-content: center;text-align: center ;padding: 2%;margin-left: 41%;">
        </form>
    </div>

    </section>
</body>

</html>