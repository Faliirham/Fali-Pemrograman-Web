<!DOCTYPE html>
<html>
    <head>
        <title>Form Input dengan Validasi</title>
        <script src = "https://code.querry.com/jquerry-3.6.0.min.js"></script>
    </head>
    <body>
        <h1> Form input dengan Validasi</h1>
        <form method="post" action="proses_validasi.php">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama"><br>
            <br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br>
            <br>

            <input type="submit" value="Submit">
        </form>

        <script>
            $(document).ready(function() {
                $("myForm").submit(function(event){
                    var nama = $('#nama').val();
                    var email = $('#email').val();
                    var valid = true;
                    
                    if (nama === "") {
                        $('#nama-error').text("Nama harus diisi.");
                        valid = false;
                    }else{
                        $('#nama-error').text("");
                    }

                    if (email === "") {
                        $('#email-error').text("Email harus diisi.");
                        valid = false;
                    } else{
                        $('#email-error').text("");
                    }

                    if (valid) {
                        (!event.preventDefault());x
                    }
                });
            });
        </script>
    </body>
</html>