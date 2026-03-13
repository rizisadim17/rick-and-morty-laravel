import { api } from '@/lib/api';
import CharacterCard from '@/components/CharacterCard';
import PaginationControls from '@/components/Pagination';
import SearchForm from '@/components/SearchForm';
import { Suspense } from 'react';

interface Props {
  searchParams: Promise<{ q?: string; page?: string }>;
}

export default async function SearchLocationPage({ searchParams }: Props) {
  const { q, page } = await searchParams;
  const currentPage = Number(page ?? 1);

  let result = null;
  if (q) {
    result = await api.search.byLocation(q, currentPage);
  }

  return (
    <div>
      <h1 className="text-3xl font-bold text-green-400 mb-6">Search by Location</h1>

      <Suspense>
        <SearchForm
          placeholder="e.g. Earth"
          basePath="/search/location"
          defaultValue={q ?? ''}
        />
      </Suspense>

      {q && result && (
        <div className="mt-8">
          <p className="text-gray-400 mb-4">
            Results for: <span className="text-white font-semibold">{q}</span>
            {result.pagination && ` — ${result.pagination.total_pages} page(s)`}
          </p>

          {result.characters.length === 0 ? (
            <p className="text-gray-500">No characters found in this location.</p>
          ) : (
            <>
              <div className="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                {result.characters.map((character) => (
                  <CharacterCard key={character.id} character={character} />
                ))}
              </div>

              {result.pagination && (
                <Suspense>
                  <PaginationControls pagination={result.pagination} />
                </Suspense>
              )}
            </>
          )}
        </div>
      )}
    </div>
  );
}
