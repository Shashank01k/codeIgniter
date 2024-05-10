<?php 
// print_R($flashMessage); 
// die;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "project_b/assets/layouts/header.php"?>
    <title>Dashboard</title>
</head>
<body>
    <h4>Welcome To User Dashboard</h4>
    <!-- <div class="container martop">
        <div class="col-md-6 center_div">
            <p>Welcome User | <a href="</?php echo base_url()?>/logout">Logout</a></p>
        </div>
    </div> -->
    <div class="container">
        <?php if($total > 0):?>
            <table class="table">
                <thead>
                <tr>
                    <th>
                        <input type="checkbox" name="main_checkbox" id="main_checkbox" onclick="selectAllUsers()">
                    </th>
                    <th>Sr.No.</th>
                    <th>USER NAME</th>
                    <th>PHONE</th>
                    <th>EMAIL ID</th>
                    <th>GENDER</th>
                    <th>STATE</th>
                    <th>CREATED DATE</th>
                    <!-- <th>MODIFIED DATE</th> -->
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                    <?php 
                        // print_R($data); die;
                        $rowId = 1;
                        foreach($userDataArray as $userDataKey => $userDataValue) {
                            // print_R($userDataValue); die;
                            $userId = $userDataValue['u_id'];
                            $tempUserName = $userDataValue['user_name'];
                            $userName = $userDataValue['user_name'];
                            $tempStateName = $userDataValue['state_name'];
                            $stateName = $userDataValue['state_name'];

                            if(strlen($userName) >= 10){
                                $userName = substr($userName,0,10).'...';
                            }
                            if(strlen($stateName) >= 12){
                                $stateName = substr($stateName,0,12).'...';
                            }
                            ?>
                            <tr>
                                <td>
                                    <!-- Checkbox for selecting individual user -->
                                    <input type="checkbox" name="selected_users[]" value="<?php echo $userId; ?>">
                                </td>
                                <td><?php echo $userId ?></td>
                                <td>
                                    <div data-toggle="tooltip" value="<?= $tempUserName ?>" title="<?= $tempUserName ?>" id="myInput" onclick="copyUserNameValue('<?=  $tempUserName ?>')">
                                        <?php echo ucwords($userName); ?> 
                                    </div>
                                </td>
                                <td><?php echo $userDataValue['phone']; ?></td>
                                <td><?php echo $userDataValue['email']; ?></td>
                                <td><?php echo ucfirst($userDataValue['gender']); ?></td>
                                <td>
                                    <div data-toggle="tooltip" title="<?= $tempStateName ?>">
                                        <?php echo $stateName; ?> 
                                    </div>
                                </td>
                                <td><?php echo date('d F Y', strtotime($userDataValue['created_at'])); ?></td>
                                <td>
                                    <a href="<?php echo base_url() ?>update/<?php echo $userDataValue['u_id'];?>">
                                        <button type="submit" class="btn btn-primary">EDIT</button>
                                    </a>
                                    <a onclick="return confirm('Are you sure want to move to trash?')" href="<?php echo base_url() ?>delete/<?php echo $userDataValue['u_id'];?>">
                                        <button type="submit" class="btn btn-danger">DELETE</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            $rowId++;
                        }
                        ?>
                        <div id="messageDiv"></div> <!-- The div to display messages -->
                </tbody>
            </table>
            <?= $pager->makeLinks($page,$perPage,$total) ?>
            <!-- </?= $page->links() ?> -->
            <?php else: echo "<h4><center> No Data Found 😐</center> </h4>"; endif;?>        
        </div>
        <?php include "project_b/assets/layouts/footer.php"?>
</body>
    <script>
        function selectAllUsers() {
            var mainCheckbox = document.getElementById('main_checkbox');
            var checkboxes = document.querySelectorAll('input[name="selected_users[]"]');
            var checkedCount = 0;
            
            // Count the number of checked checkboxes
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkedCount++;
                }
            });

            // Update the state of the main checkbox based on checkedCount
            mainCheckbox.checked = (checkedCount === checkboxes.length);
        }

        function updateMainCheckbox() {
            var mainCheckbox = document.getElementById('main_checkbox');
            var checkboxes = document.querySelectorAll('input[name="selected_users[]"]');
            var checkedCount = 0;
            
            // Count the number of checked checkboxes
            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    checkedCount++;
                }
            });

            // Update the state of the main checkbox based on checkedCount
            mainCheckbox.checked = (checkedCount === checkboxes.length);
        }

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
        
        // var titleText = '';
        function copyUserNameValue(titleText) {
            console.log(titleText)
            // Create a temporary input element
            var input = document.createElement("input");
            input.setAttribute("value", titleText);
            document.body.appendChild(input);

            // Select the text inside the input element
            input.select();

            // Copy the selected text
            document.execCommand("copy");

            // Remove the temporary input element
            document.body.removeChild(input);

            // Alert the user (optional)
            var messageDiv = document.getElementById("messageDiv");
            messageDiv.textContent = "Copied: " + titleText;

            // alert("Copied the text: " + titleText);
        }
    </script>
</html>