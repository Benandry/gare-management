import { useEffect, useState } from "react";
import { FormDriver } from "./form";
import { getData, updateData } from "../../../fetchData/fetchFromApi";
import { useNavigate, useParams } from "react-router-dom";

function Edit() {
  const { id } = useParams();
  const [message, setMessage] = useState("");
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();
  const [driver, setDriver] = useState({
    name: "",
    lastName: "",
    phone: "",
    permis: "",
  });

  const fetchData = async () => {
    setLoading(true);
    const { result } = await getData("settings/driver/show/" + id);
    setDriver(result?.data);
    setLoading(false);
  };

  useEffect(() => {
    fetchData();
  }, []);
  if (loading) {
    return <h2 className="text-center text-gray-700"> LOADING...</h2>;
  }

  const handleSubmit = (e) => {
    e.preventDefault();
    const response = updateData("settings/driver/edit/" + id, driver);
    setMessage(response?.message);
    navigate("/settings/driver/");
  };

  const handleChange = (e) => {
    setDriver({ ...driver, [e.target.name]: e.target.value });
  };
  return (
    <div>
      <h3 className=" m-4 text-center text-gray-700 font-semibold text-xl">
        Insertion de voyageur
      </h3>
      <FormDriver
        textButton="Modifier"
        handleChange={handleChange}
        handleSubmit={handleSubmit}
        driver={driver}
      />
    </div>
  );
}
export default Edit;
