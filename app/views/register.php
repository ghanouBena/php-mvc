

        <!--<div class="container" >
            <input type="file" name="file" id="file">

             Drag and Drop container
            <div class="upload-area"  id="uploadfile">
                <h1>Drag and Drop file here<br/>Or<br/>Click to select file</h1>
            </div>
        </div>
        -->
        <form action="<?= SITE; ?>users/register" method="POST">
            <input type="text" name="firstName" value="" placeholder="First name">
            <span><?php if(isset($data['errors']['firstName'])){ echo $data['errors']['firstName'];} ?></span><br>
            <input type="text" name="lastName" value="" placeholder="Last name">
            <span><?php if(isset($data['errors']['lastName'])){ echo $data['errors']['lastName'];} ?></span><br>
            <input type="submit" name="save" value="save" >
        </form>
