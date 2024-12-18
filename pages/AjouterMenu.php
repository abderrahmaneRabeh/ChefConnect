<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChefConnect - Ajouter Menu</title>

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/AjouterMenu.css">
</head>

<body>

    <form>
        <div class="mb-3">
            <label for="chef_id" class="form-label">Chef ID:</label>
            <input type="text" id="chef_id" name="chef_id" class="form-control" placeholder="Enter Chef ID">
        </div>
        <div class="mb-3">
            <label for="titre_menu" class="form-label">Menu Title:</label>
            <input type="text" id="titre_menu" name="titre_menu" class="form-control" placeholder="Enter Menu Title">
        </div>
        <div class="mb-3">
            <label for="description_menu" class="form-label">Description:</label>
            <textarea id="description_menu" name="description_menu" class="form-control" rows="3"
                placeholder="Enter Menu Description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image_menu" class="form-label">Image:</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image_menu" name="image_menu"
                        aria-describedby="inputGroupFileAddon04">
                    <label class="custom-file-label" for="image_menu">
                        <i class="fas fa-upload"></i> Upload Image
                    </label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn text-white w-100">Add Menu</button>
    </form>

</body>

</html>