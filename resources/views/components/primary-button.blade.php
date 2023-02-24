<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-center items-center px-4 py-2 border-none border-primary border-4 shadow-lg rounded-md bg-primary text-secondary hover:bg-secondary hover:text-primary focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
