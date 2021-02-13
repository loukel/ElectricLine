import React from "react";
import ReactDOM from "react-dom";

// import 'bootstrap/dist/css/bootstrap.css'
import "./index.css";
import Datetime from "./Datetime";

function DatetimePicker() {
  return <Datetime minDate="today" maxDate="2023-06-05" />;
}

export default DatetimePicker;

if (document.getElementById("datetime-picker")) {
  ReactDOM.render(
    <DatetimePicker />,
    document.getElementById("datetime-picker")
  );
}
