'use client';

import { useRouter, useSearchParams } from 'next/navigation';
import type { Pagination } from '@/types';

interface Props {
  pagination: Pagination;
}

export default function PaginationControls({ pagination }: Props) {
  const router = useRouter();
  const searchParams = useSearchParams();

  const goTo = (page: number) => {
    const params = new URLSearchParams(searchParams.toString());
    params.set('page', String(page));
    router.push(`?${params.toString()}`);
  };

  if (pagination.total_pages <= 1) return null;

  return (
    <div className="flex items-center justify-center gap-3 mt-8">
      <button
        disabled={!pagination.has_prev}
        onClick={() => goTo(pagination.current_page - 1)}
        className="px-4 py-2 bg-gray-700 text-white rounded disabled:opacity-40 hover:bg-green-600 transition-colors"
      >
        ← Prev
      </button>

      <span className="text-gray-300 text-sm">
        Page {pagination.current_page} of {pagination.total_pages}
      </span>

      <button
        disabled={!pagination.has_next}
        onClick={() => goTo(pagination.current_page + 1)}
        className="px-4 py-2 bg-gray-700 text-white rounded disabled:opacity-40 hover:bg-green-600 transition-colors"
      >
        Next →
      </button>
    </div>
  );
}
