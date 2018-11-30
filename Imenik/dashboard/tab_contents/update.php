<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-6">
            <form class="form-vertical" role="form" id="updatePersonForm">
                <p class="text-center" id="updateRes"></p>
                <?php
                $fetch = mysqli_query($con,"SELECT * FROM podaci");
                if(mysqli_num_rows($fetch)<=0){
                    echo '<h3 class="text-center font">Nije pronadjen.</h3>';
                }
                else{
                    ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Selektujte kontakt</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <select class="form-control" id="pemail" name="email">
                                <option value=0>Odaberi</option>
                                <?php
                                while($row = mysqli_fetch_array($fetch,MYSQLI_ASSOC )){
                                    echo '<option value="'.$row['telefonski_broj'].'">'.$row['telefonski_broj'].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Ime</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="updatefn" id="updatefn" autocomplete="off" />
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Prezime</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="updateln" id="updateln" autocomplete="off" />
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Telefonski_broj</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" class="form-control" name="updatetelbr" id="updatemobile" autocomplete="off" />
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Grad</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <textarea maxlength="250" class="form-control" name="updategrad" id="updatepermanant" autocomplete="off"></textarea>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Ulica</label>
                        </div>
                        <div class="form-group col-sm-6">
                            <textarea maxlength="250" class="form-control" name="updateulica" id="updatetemporary" autocomplete="off"></textarea>
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                <div class="col-sm-4">
                    <label>Br</label>
                </div>
                <div class="form-group col-sm-6">
                    <textarea maxlength="250" class="form-control" name="updatebr" id="updatetemporary" autocomplete="off"></textarea>
                </div>
                <div class="col-sm-3"></div>
        </div>
                    <div class="row">
                        <div class="col-sm-4">
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" class="btn btn-success" value="Update" id="updateBtn" />
                        </div>
                        <div class="col-sm-3">
                            <input type="reset" class="btn btn-danger" value="Reset" id="resetBtn" />
                        </div>
                    </div>
                <?php } ?>
            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>