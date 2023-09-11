import axios from "axios";
import React, { useState } from "react";

const Settings = () => {
  const [firstName, setFirstName] = useState();
  const [lastName, setLastName] = useState();
  const [email, setEmail] = useState();

  const url = `${appLocalizer.apiUrl}/mnf/v1/settings`;

  const handleSubmit = (e) => {
    e.preventDefault();
    axios
      .post(url, {
        firstName: firstName,
        lastName: lastName,
        email: email,
      })
      .then((res) => {
        console.log(res);
      });
  };

  return (
    <React.Fragment>
      <h2>React Setting Form</h2>
      <form
        onSubmit={(e) => handleSubmit(e)}
        action=""
        className="work-setting-form"
      >
        <table role="presentation" className="table-form">
          <tbody>
            <tr>
              <th scope="row">
                <label htmlFor="firstName">First Name</label>
              </th>
              <td>
                <input
                  type="text"
                  id="firstName"
                  name="firstName"
                  value={firstName}
                  onChange={(e) => {
                    setFirstName(e.target.value);
                  }}
                  className="regular-text"
                />
              </td>
            </tr>

            <tr>
              <th scope="row">
                <label htmlFor="lastName">Last Name</label>
              </th>
              <td>
                <input
                  type="text"
                  id="lastName"
                  name="lastName"
                  value={lastName}
                  onChange={(e) => {
                    setLastName(e.target.value);
                  }}
                  className="regular-text"
                />
              </td>
            </tr>
            <tr>
              <th scope="row">
                <label htmlFor="email">Email</label>
              </th>
              <td>
                <input
                  type="text"
                  id="email"
                  name="email"
                  value={email}
                  onChange={(e) => {
                    setEmail(e.target.value);
                  }}
                  className="email"
                />
              </td>
            </tr>
          </tbody>
          <div className="submit">
            <button type="submit" className="button button-primary">
              Save
            </button>
          </div>
        </table>
      </form>
    </React.Fragment>
  );
};

export default Settings;
<h1>My New Form</h1>;
