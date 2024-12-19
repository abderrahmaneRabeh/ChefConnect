<?php

include_once '../db/MenuPlatController.php';

// Check if menu_id is provided
if (isset($_GET['menu_id'])) {
    $menuData = get_One_Menu($conx, $_GET['menu_id']);

    // echo $menuData['id_menu'];
    // echo $menuData['titre_menu'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChefConnect - Ajouter Des Plats</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/AjouterPlat.css">
</head>

<body>
    <div class="text-center mb-3">
        <div class="btn-group">
            <a href="/index.php" class="btn btn-custom">Retour à Accueil</a>
            <a href="/dashboard/admin/menu.php" class="btn btn-custom">Retour à Dashboard</a>
        </div>
    </div>

    <form action="../db/Processuss_Ajouter_plats.php" method="post" enctype="multipart/form-data">
        <!-- Dynamic Plats Container -->
        <div id="plats" class="d-flex justify-content-center flex-wrap" style="width: 80%;"></div>

        <!-- Add Plate Button -->
        <button type="button" class="btn text-white rounded-circle mt-4" onclick="addPlat()">
            <i class="fa fa-plus"></i>
        </button>

        <br><br>

        <!-- Submit Button -->
        <button type="submit" class="btn text-white w-100 mt-4">Submit Les plats</button>
    </form>

    <script>
        let platCounter = 0;

        function addPlat() {
            platCounter++;

            const menuOptions = `
                <option value="<?php echo $menuData['id_menu']; ?>" selected><?php echo $menuData['titre_menu']; ?></option>
            `;

            const platForm = `
                <div class="plat-container mb-4 border p-3 rounded">
                    <h5>Plat ${platCounter}</h5>
                    <div class="mb-3">
                        <label for="menu_id_${platCounter}" class="form-label">Menu</label>
                        <select id="menu_id_${platCounter}" name="menu_id[]" class="form-control" readonly>
                            ${menuOptions}
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nom_de_plat_${platCounter}" class="form-label">Nom du Plat:</label>
                        <input type="text" id="nom_de_plat_${platCounter}" name="nom_de_plat[]" class="form-control" placeholder="Nom du plat" required>
                    </div>
                    <div class="mb-3">
                        <label for="description_${platCounter}" class="form-label">Description:</label>
                        <textarea id="description_${platCounter}" name="description[]" class="form-control" rows="3" placeholder="Description du plat" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="img_${platCounter}" class="form-label">Image:</label>
                        <input type="file" id="img_${platCounter}" name="img[]" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm" onclick="removePlat(this)">Remove</button>
                </div>
            `;
            document.getElementById("plats").insertAdjacentHTML('beforeend', platForm);
        }

        function removePlat(button) {
            button.parentElement.remove();
        }
    </script>
</body>

</html>