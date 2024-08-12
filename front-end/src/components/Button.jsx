import { Link } from "react-router-dom";

function Button({ to, label }) {
  return (
    <Link to={to} className="p-3 m-5 rounded-sm text-white bg-blue-600">
      {label}
    </Link>
  );
}

export default Button;
