<tbody>
                             <?php
                                while($userRow = $users -> fetch_assoc()){
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $userRow["id"] ?></th>
                                    <td><?php echo $userRow["fname"] ?></td>
                                    <td><?php echo $userRow["lname"] ?></td>
                                    <?php 
                                    if($userRow["image"] == ""){
                                        ?>
                                        <td><img src="../image/user-images/dummy-user.png" alt="user image" class="mx-auto rounded-circle user-image-table"></td>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <td><img src="<?php echo $userRow["image"] ?>" alt="user image" class="mx-auto rounded-circle user-image-table"></td>
                                        <?php
                                    }
                                    ?>
                                    <td><?php echo $userRow["email"] ?></td>
                                    <td><?php echo $userRow["cno"] ?></td>
                                    <td><?php echo $userRow["address"] ?></td>
                                    <td><?php echo $userRow["profession"] ?></td>
                                    <td><?php echo $userRow["username"] ?></td>
                                    <td><a href="./editUser.php?user=<?php echo $userRow["id"] ?>" class="text-decoration-none btn btn-outline-warning">Edit</a></td>
                                    <td><a href="../controller/deleteUserController.php?user=<?php echo $userRow["id"] ?>" class="text-decoration-none btn btn-outline-danger">Delete</a></td>
                                </tr>
                                <?php
                                }
                             ?>
                        </tbody>