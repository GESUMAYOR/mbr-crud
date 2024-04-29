import React from "react";
import Container from "react-bootstrap/Container";
import Nav from "react-bootstrap/Nav";
import Navbar from "react-bootstrap/Navbar";
import NavDropdown from "react-bootstrap/NavDropdown";
import { useDispatch, useSelector } from "react-redux";
import { Link, useNavigate } from "react-router-dom";
import { logout, deleteUserAction } from "../../actions/userActions";
import Loading from "../../components/Loading";
import ErrorMessage from "../../components/ErrorMessage";

const Header = () => {
  const navigate = useNavigate();

  const dispatch = useDispatch();

  const userLogin = useSelector((state) => state.userLogin);
  const { userInfo } = userLogin;

  const userDelete = useSelector((state) => state.userDelete);
  const {
    loading: loadingDelete,
    error: errorDelete,
    success: successDelete,
  } = userDelete;
  const { loading, error } = userDelete;

  const logoutHandler = () => {
    dispatch(logout());
    navigate("/");
  };

  {
    /*const deleteHandler = (id) => {
    if (window.confirm("Are you sure?")) {
      dispatch(deleteUserAction(id));
    }
  };*/
  }

  return (
    <Navbar
      bg="primary"
      expand="lg"
      variant="dark"
      className="bg-body-tertiary"
    >
      <Container>
        <Navbar.Brand>
          <Link
            to="/"
            style={{
              color: "#fff",
            }}
          >
            MBR
          </Link>
        </Navbar.Brand>
        {error && <ErrorMessage variant="danger">{error}</ErrorMessage>}
        {errorDelete && (
          <ErrorMessage variant="danger">{errorDelete}</ErrorMessage>
        )}
        {loading && <Loading />}
        {loadingDelete && <Loading />}
        <Navbar.Toggle aria-controls="basic-navbar-nav" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="me-auto">
            <Nav.Link href="#home">About</Nav.Link>
            {/*<Nav>
              {userInfo ? (
                //<>*/}
            <Nav.Link>
              <Link
                to="/community"
                style={{
                  color: "#fff",
                }}
              >
                Community
              </Link>
            </Nav.Link>
            <NavDropdown
              title="Current User"
              /*{userInfo?.name}*/ id="basic-nav-dropdown"
            >
              <NavDropdown.Item href="/profile">My Profile</NavDropdown.Item>
              <NavDropdown.Item href="#action/3.2">
                Update Profile
              </NavDropdown.Item>
              <NavDropdown.Item onClick={logoutHandler}>
                Logout
              </NavDropdown.Item>
              <NavDropdown.Divider />
              <NavDropdown.Item
                className="mx-2"
                variant="danger"
                //onClick={() => deleteHandler(match.params.id)}
              >
                Delete Profile
              </NavDropdown.Item>
            </NavDropdown>

            {/*) : (
                <Nav.Link href="/login">Login</Nav.Link>
              )}
            //</Nav>*/}
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
};

export default Header;
