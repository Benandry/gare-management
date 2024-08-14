import { Link } from "react-router-dom";

function Pagination({ totalPages, currentPage,nextPage}) {
  const pages = Array.from({ length: totalPages }, (_, index) => index + 1);
  const prevPage = currentPage > 1 ? currentPage - 1 : null;
  const nextPage = currentPage < totalPages ? currentPage + 1 : null;

  return (
    <div className="flex justify-center m-4">
      <ul className="inline-flex -space-x-px text-sm">
        <li>
          <Link
            to= to={`?page=${prevPage}`}
            className="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          >
            Previous
          </Link>
        </li>
        {pages.map((page) => (
          <li key={page}>
            <Link
              to={`?page=${page}`}
              className="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
            >
              {page}
            </Link>
          </li>
        ))}
        <li>
          <Link
            to= to={`?page=${nextPage}`}
            className="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
          >
            Next
          </Link>
        </li>
      </ul>
    </div>
  );
}

export default Pagination;
