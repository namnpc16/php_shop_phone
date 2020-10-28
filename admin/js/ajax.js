function config_status_comm(comm_status, comm_id) {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("comm_status["+comm_id+"]").innerHTML = this.response;
        }
    }
    // ?comm_status=" + comm_status + "&comm_id" + comm_id 
    xhttp.open("POST", "config_status_comm.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("comm_status=" + comm_status + "&comm_id=" + comm_id);
}