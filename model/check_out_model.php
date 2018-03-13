<?php 
	
	if(isset($_GET['check_out']) && isset($_GET['total_cost']) && isset($_SESSION['shopping_list'])){   
        require('model.php'); 

        // Get user information from database

        $sql_user_id = sprintf("SELECT * FROM users WHERE id='%s'",
                       mysqli_real_escape_string($conn,$_SESSION["user_id"]));
        $result_user_id = mysqli_query($conn,$sql_user_id);

      
    	$index = count($_SESSION["shopping_list"])-1;  
    	$id = mysqli_real_escape_string($conn,$_SESSION["shopping_list"][$index]["price_id"]);
    	$price = mysqli_real_escape_string($conn,$_SESSION["shopping_list"][$index]["price"]);
    	$sql_prices = "SELECT * FROM `prices` WHERE `id` = '$id' AND `price` = '$price'";
    	$result = $conn->query($sql_prices);
    	$prices = $result->fetch_array(MYSQLI_ASSOC);
    	$temp_array = array('size' => $prices['size'], 'weight' => $prices['weight']);
    	array_push($_SESSION["shopping_list"][$index], $temp_array);
   }
   else if(isset($_POST['customer_first_name']) && isset($_POST['customer_last_name']) && isset($_POST['customer_email']) && isset($_POST['cutomer_phone']) && isset($_POST['customer_street']) && isset($_POST['customer_city']) && isset($_POST['customer_state']) && isset($_POST['customer_country'])  && isset($_SESSION['shopping_list'])) {
      require('model.php');
      $date = new DateTime();
      $date_of_order = date_format($date, 'Y-m-d H:i:s');
      for ($i=0; $i < count($_SESSION['shopping_list']); $i++) { 
        foreach ($_SESSION['shopping_list'] as $i => $sold_icon) {
            $sql_add_sold_icon=sprintf("INSERT INTO sold_icons (icon_id, name, price, user_id, date_of_order) VALUES ('%s','%s','%s','%s', '%s')", $sold_icon['id'], mysqli_real_escape_string($conn,$sold_icon['name']), $sold_icon['price'], $_SESSION['user_id'], $date_of_order);
              $result_add_sold_icon = mysqli_query($conn,$sql_add_sold_icon);
              echo $sql_add_sold_icon;
        }
      }
      
      #MAIL TO CUSTOMER
      function send_mail_to_customer()
      {
        $to = ''.$_POST["customer_email"].'';
        $subject = 'Order Confirmation';

        $message = '
  <hr>
    <h1>Order Details</h1>
    <table>
      <thead>
          <tr>
            <th>#</th>
            <th>Icon Name</th>
            <th>Icon Size (inch)</th>
            <th>Icon Weight (gram)</th>
            <th>Icon Price (US $)</th>
          </tr>
        </thead>
        <tbody>';
        for ($i=0; $i<count($_SESSION['shopping_list']); $i++){
          foreach ($_SESSION['shopping_list'] as $i => $icons){
          $message .= '  
            <tr>  
              <td>

                <h4># '. $i+1 .'</h4>
              </td>
              <td>
                <h3> '.$icons["name"] .' <smaill>(id: '. $icons["id"] .')</small></h3>
              </td>
              <td>
                <h4>'. @$icons[0]["size"] .'</h4>
              </td>
              <td>
                <h4>'. @$icons[0]["weight"] .'</h4>
              </td>
              <td>
                <h4>'. $icons["price"] .'</h4>
              </td>
            </tr>';
            }
          }
          $message .= '
            </tbody>
        </table>
        <table>
        <thead>
          <th>
            <h3>Total Cost</h3>
          </th>
          <th><h3>'. $_GET["total_cost"] .' $ <small> + shipping costs</small></h3></th>
        </thead>
        </table>
        <br>
        <hr>
        <h2>Dear '.$_POST["customer_first_name"].',</h2>
        <p>Thank you for being our valued customer. We are grateful for the pleasure of serving you and meeting your needs. <br>
          We wish you a beautiful day.
        ';

        $headers = 'MIME-Version: 1.0' . '\r\n';
        $headers .= "Content-type:text/html;charset=UTF-8" . '\r\n';


        $headers .= 'From: <webmaster@example.com>' . '\r\n';

        mail($to,$subject,$message,$headers);
      }
      

      #MAIL TO OWNER
      function send_mail_to_owner()
      {
        $to = "rasha08@gmail.com";
        $subject = "New Order on orthoicon.com";

        $message = '
  <hr>
    <h1>Order Details</h1>
    <table>
      <thead>
          <tr>
            <th>#</th>
            <th>Icon Name</th>
            <th>Icon Size (inch)</th>
            <th>Icon Weight (gram)</th>
            <th>Icon Price (US $)</th>
          </tr>
        </thead>
        <tbody>';
        for ($i=0; $i<count($_SESSION['shopping_list']); $i++){
          foreach ($_SESSION['shopping_list'] as $i => $icons){
          $message .= '  
            <tr>  
              <td>

                <h4># '. $i+1 .'</h4>
              </td>
              <td>
                <h3> '.$icons["name"] .' <smaill>(id: '. $icons["id"] .')</small></h3>
              </td>
              <td>
                <h4>'. @$icons[0]["size"] .'</h4>
              </td>
              <td>
                <h4>'. @$icons[0]["weight"] .'</h4>
              </td>
              <td>
                <h4>'. $icons["price"] .'</h4>
              </td>
            </tr>';
            }
          }
          $message .= '
            </tbody>
        </table>
        <table>
        <thead>
          <th>
            <h3>Total Cost</h3>
          </th>
          <th><h3>'. $_GET["total_cost"] .' $ <small> + shipping costs</small></h3></th>
        </thead>
        </table>

  <hr>
    <h1>Customer Information</h1>
    <hr>
    <table>
      <thead>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
      </thead>
      <tbody>
        <tr>
          <td>'.$_POST["customer_first_name"].'</td>
          <td>'.$_POST["customer_last_name"].'</td>
          <td>'.$_POST["customer_email"].'</td>
          <td>'.$_POST["cutomer_phone"].'</td>
        </tr>
      </tbody>
      <thead>
        <th>Street Address</th>
        <th>City</th>
        <th>State</th>
        <th>Country</th>
      </thead> 
      <tbody>
        <tr>
          <td>'.$_POST["customer_street"].'</td>
          <td>'.$_POST["customer_city"].'</td>
          <td>'.$_POST["customer_state"].'</td>
          <td>'.$_POST["customer_country"].'</td>
        </tr>
      </tbody>
      </table>       
        ';

      $headers = 'MIME-Version: 1.0' . '\r\n';
      $headers .= "Content-type:text/html;charset=UTF-8" . '\r\n';


      $headers .= 'From: <webmaster@example.com>' . '\r\n';

      mail($to,$subject,$message,$headers);
      }
    send_mail_to_customer();
    send_mail_to_owner();
    unset($_SESSION['shopping_list']);
    header("Location:http://localhost/orthodox-icons-shop/index.php?shop=Proceed+to+Shop&icon_sold=SOLD");
   }else{
    unset($_SESSION['shopping_list']);
    header('Location:http://localhost/orthodox-icons-shop/index.php?shopping_list=Shopping+List');
   }

?>