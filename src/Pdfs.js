import "./Images.css";
import React from "react";
import {Link} from "react-router-dom";
import {FaHome} from "react-icons/fa";
const Pdfs=() => {
    return(
    <div className="nav">
        <ul>
            <li>
                <div class="onput">
                <Link to="/Images">Images</Link>
                &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
                &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                &nbsp;  &nbsp;  &nbsp;  &nbsp; 
                <Link to="/Documents">Documents</Link>
                &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
                &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;
                &nbsp;  &nbsp;  &nbsp;  &nbsp;  
                <Link to="/Videos">Videos</Link>
                &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp; 
                &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  &nbsp;  
                <Link to="/Ppt">Power point presentations</Link>
                &nbsp;  &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; 
                <Link to="/Dashboard"><button className="homebutton"><FaHome /></button></Link></div>
            </li>
        </ul>
    </div>
    )
}
export default Pdfs;