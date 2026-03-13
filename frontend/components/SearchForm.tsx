'use client';

import { useRouter } from 'next/navigation';
import { useState } from 'react';

interface Props {
  placeholder: string;
  basePath: string;
  defaultValue?: string;
}

export default function SearchForm({ placeholder, basePath, defaultValue = '' }: Props) {
  const [query, setQuery] = useState(defaultValue);
  const router = useRouter();

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (query.trim()) {
      router.push(`${basePath}?q=${encodeURIComponent(query.trim())}`);
    }
  };

  return (
    <form onSubmit={handleSubmit} className="flex gap-2 max-w-md mx-auto">
      <input
        type="text"
        value={query}
        onChange={(e) => setQuery(e.target.value)}
        placeholder={placeholder}
        className="flex-1 px-4 py-2 rounded-lg bg-gray-700 text-white placeholder-gray-400 border border-gray-600 focus:outline-none focus:border-green-500"
      />
      <button
        type="submit"
        className="px-5 py-2 bg-green-500 hover:bg-green-400 text-black font-semibold rounded-lg transition-colors"
      >
        Search
      </button>
    </form>
  );
}
