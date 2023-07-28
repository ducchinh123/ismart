</body>

<script>
    document.querySelector("#eyes").addEventListener("click", () => {

        if (document.querySelector("#eyes").classList.toggle('active')) {

            document.querySelector("#eyes").innerHTML = '<i class="fa-solid fa-eye"></i>';
            document.querySelector("input[type='password']").type = 'text';

        } else {
            document.querySelector("#eyes").innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
            document.querySelector("input#password").type = 'password';


        }

    })
</script>

</html>