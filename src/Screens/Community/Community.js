import React, { useEffect } from "react";
import SharedScreen from "../../components/SharedScreen";
import { Card } from "react-bootstrap";
import { useDispatch, useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";
import { listCommunity } from "../../actions/communityActions";
import Loading from "../../components/Loading";
import ErrorMessage from "../../components/ErrorMessage";

const Community = () => {
  const dispatch = useDispatch();

  const communityList = useSelector((state) => state.communityList);
  const { loading, users, error } = communityList;

  const navigate = useNavigate();

  const userLogin = useSelector((state) => state.userLogin);
  const { userInfo } = userLogin;

  console.log(users);

  useEffect(() => {
    dispatch(listCommunity());
    {
      /*if (!userInfo) {
      navigate("/");
    }*/
    }
  }, [dispatch]);

  return (
    <SharedScreen title="Welcome Back" /*{`Welcome Back ${userInfo.name}..`}*/>
      <div>
        <div
          style={{
            marginLeft: "10",
            marginBottom: "6",
          }}
          size="lg"
        >
          Community Reveal
        </div>
        {error && <ErrorMessage variant="danger">{error}</ErrorMessage>}
        {loading && <Loading />}
        {users?.map((user) => (
          <Card style={{ margin: "10" }} key={user._id}>
            <Card.Header style={{ display: "flex" }}>
              <span
                style={{
                  color: "black",
                  textDecoration: "none",
                  flex: 1,
                  cursor: "pointer",
                  alignSelf: "center",
                  fontSize: 18,
                }}
              ></span>
            </Card.Header>
          </Card>
        ))}
      </div>
    </SharedScreen>
  );
};

export default Community;
