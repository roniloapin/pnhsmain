<style>
    .bold-title{
        font-family: Tahoma;
        font-weight: bold;
    }
</style>

<template>
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-8 mt-3">
                <div class="card">
                    <div class="card-header bold-title text-success"> About</div>

                    <div class="card-body">
                        <p>
                            System Name: <strong style="color: green;"> PNHS Enrollment System </strong><br>
                            Developers: <strong style="color: green;"> &nbsp;&nbsp;&nbsp; Kim Shin Nodalo, Jazmine, Joel Marinay </strong><br>
                            Copyright: <strong style="color: green;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2020 @ DOH CHD - Bicol </strong><br><br>
                            System Development:
                        </p>
                            <li style="text-indent: 10px;">Back-end: <strong>PHP, MySQL</strong></li>
                            <li style="text-indent: 10px;">Front-end: <strong>Vuejs</strong></li>
                            <li style="text-indent: 10px;">Framework: <strong>Laravel</strong></li>
                            <li style="text-indent: 10px;">Template: <strong>AdminLTE</strong></li>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
