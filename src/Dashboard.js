import React from "react";
import "./Dashboard.css";
import {FaPowerOff} from "react-icons/fa";


const Dashboard = () => {
    return (
        <div class = "backgroundimage">
            <a href = "http://localhost:3001/"><button className="poweroff"><FaPowerOff/></button></a>
        <div class="backgroundcolor">
        <center>
            <hr></hr>
            <br></br><br></br><br></br><br></br>
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp;&nbsp; &nbsp;
            <a href ='http://localhost:3000/src/viewpdf.php'><button className='dashboard'>View Files</button></a>
           &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            <a href='http://localhost:3000/src/viewpublicpdfs.php'><button className='dashboard'>Public Interface</button></a>
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
            <br></br><br></br><br></br><br></br>
            <hr></hr>
            </center>
            </div>
            <hr  className="lastline"></hr>
            <br></br>
            <div  className="fileupload">
            <center>
            <form action="http://localhost:3000/src/Backend.php"
                method="post" encType="multipart/form-data">
                    <br></br>
                    <center><h1>UPLOAD YOUR FILE HERE</h1></center>
                    <hr></hr><br></br>
                <center><input type="file" name = "fileupload"/></center><br></br><br></br>
                    <center><input className="submitfileupload" type="submit" name="submit"  value="UPLOAD"/></center>
                    </form>
                </center>
               <br></br><br></br>
                    
        </div>
        
            </div>
        );
    };
    export default Dashboard;