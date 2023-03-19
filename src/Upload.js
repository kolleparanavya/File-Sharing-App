import React from "react";
import {Link} from "react-router-dom";

const Uploadfile = () => {
return(
    <div id = 'uploadfile'>
        <div  className="fileupload">
            <center>
            <form action="http://localhost:3000/src/Backend.php"
                method="post" encType="multipart/form-data">
                    <br></br>
                    <center><h1>FILE UPLOAD</h1></center>
                    <hr></hr><br></br>
                <center><input type="file" name = "fileupload"/></center><br></br><br></br>
                    <center><input className="submitfile" type="submit" name="submit"  value="UPLOAD"/></center>
                    <br></br><br></br>
                </form>
                </center>
                <hr></hr><br></br>
                <Link to="./Viewfiles" className="view"><font color="darkblue"><b>
                    Click here to view your files</b></font></Link>
                    <br></br><br></br>
                    
        </div>
        </div>
)
}
const Upload = () => {
    return(
        <div>
            <Uploadfile/>
        </div>
    )
}
export default Upload;