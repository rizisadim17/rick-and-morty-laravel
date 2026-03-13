import type { Character, Episode, EpisodeDetail, LocationDetail, SearchResult } from '@/types';

const API_URL = process.env.NEXT_PUBLIC_API_URL ?? 'http://localhost:8000';

async function get<T>(path: string, params?: Record<string, string | number>): Promise<T> {
  const url = new URL(`${API_URL}/api${path}`);
  if (params) {
    Object.entries(params).forEach(([key, value]) => {
      url.searchParams.set(key, String(value));
    });
  }

  const res = await fetch(url.toString(), { cache: 'no-store' });

  if (!res.ok) {
    throw new Error(`API error ${res.status}: ${path}`);
  }

  return res.json();
}

export const api = {
  characters: {
    list: () => get<Character[]>('/characters'),
    get: (id: number) => get<Character>(`/characters/${id}`),
  },

  episodes: {
    list: () => get<Episode[]>('/episodes'),
    get: (id: number, page = 1) => get<EpisodeDetail>(`/episodes/${id}`, { page }),
  },

  locations: {
    get: (id: number, page = 1) => get<LocationDetail>(`/locations/${id}`, { page }),
  },

  search: {
    byDimension: (q: string, page = 1) =>
      get<SearchResult>('/search/dimension', { q, page }),
    byLocation: (q: string, page = 1) =>
      get<SearchResult>('/search/location', { q, page }),
  },
};
