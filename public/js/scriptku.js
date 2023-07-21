var modal = document.getElementById('myModal');
var btn = document.getElementById("tombolku");
var span = document.getElementById("tutup");

btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(e) {
    if (e.target == modal) {
    modal.style.display = "block";
}
}
function masukannama()
{
        if (document.form1.nama.value=="")
        {
            alert("anda belum memasukkan nama");
        }
}
function masukanttl()
{
        if (document.form1.ttl.value=="")
        {
            alert("anda belum memasukkan tempat/tanggal lahir");
        }
}
function masukanjurusan()
{
        if (document.form1.jurusan.value=="")
        {
            alert("anda belum memasukkan jurusan");
        }
}

function masukankelas()
{
        if (document.form1.kelas.value=="")
        {
            alert("anda belum memasukkan kelas");
        }
}