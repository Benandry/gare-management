function Input({
  label,
  type,
  id,
  placeholder,
  value,
  handleChange,
  required,
}) {
  return (
    <div className="mb-5">
      <label
        htmlFor={id}
        className="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
        required={required}
      >
        {label} :
      </label>
      <input
        type={type}
        name={id}
        id={id}
        value={value}
        className="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder={placeholder}
        onChange={handleChange}
      />
    </div>
  );
}

export default Input;
