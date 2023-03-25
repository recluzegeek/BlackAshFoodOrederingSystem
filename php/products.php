<?php
include './connection.php';
$query = "SELECT id, name, price, description FROM item order by rand()";
$result = mysqli_query($conn, $query);
//echo 'In the generate_cards.php file';
// Looping through records and generate cards dynamically
while ($row = mysqli_fetch_assoc($result)) {
  echo '<div class="card">';
  echo '<img src="./img/p'.$row['id'].'.jpg" class="card__image" alt="">';
  echo '<div class="card__info">';
  echo '<div class="row">';
  echo '<h4 class="card__title col-7">'.$row['name'].'</h4>';
  echo '<p class="card__price col-5 text-right">RS '.$row['price'].'</p>';
  echo '</div>';
  echo '<p class="card__desc" style="font-weight: 550">'.$row['description'].'</p>';
//  $description = strlen($row['description']) > 50 ? substr($row['description'], 0, 50) . '...' : $row['description'];
  echo '<button class="card__btn add-to-cart" data-id="'.$row['id'].'">Add to Cart</button>';
  echo '</div>';
  echo '</div>';
}

// Close database connection
mysqli_close($conn);

