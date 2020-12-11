<div class="row">

    <div id="links" class="align-self-center col-4 offset-4 rounded">

        <button class="btn btn-outline-light mt-2 cancelar volver">X</button>

        <div class="row enlaces_paginas justify-content-center">

            <div class='col-12 text-center'>
               <h2><?=$_POST["categoria"]?></h2>
            </div>

            <?php
            foreach ($datos as $item) {
                echo "
                <div class='col-12 text-center'>
                <a target = '_blank' href='" . $item['url'] . "'><button class='btn'>" . $item['nombre'] . "</button></a>
                </div>
                ";
            }
            ?>
        </div>

    </div>

</div>