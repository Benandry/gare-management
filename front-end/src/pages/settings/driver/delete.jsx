import { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import { deleteData } from "../../../fetchData/fetchFromApi";

function Delete() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [loading, setLoading] = useState(false);

  const fetchData = async () => {
    setLoading(true);
    await deleteData("settings/driver/remove/" + id);
    setLoading(false);
    navigate("/settings/driver");
  };

  useEffect(() => {
    fetchData();
  }, []);
  if (loading) {
    return <h2 className="text-center text-gray-700"> LOADING...</h2>;
  }
}
export default Delete;
