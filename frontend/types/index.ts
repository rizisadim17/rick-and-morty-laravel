export interface Character {
  id: number;
  name: string;
  status: 'Alive' | 'Dead' | 'unknown';
  species: string;
  gender: string;
  image: string;
  origin: { name: string; url: string };
  location: { name: string; url: string };
  episode: string[];
}

export interface Episode {
  id: number;
  name: string;
  air_date: string;
  episode: string;
  url: string;
}

export interface Location {
  id: number;
  name: string;
  type: string;
  dimension: string;
  url: string;
}

export interface Pagination {
  current_page: number;
  total_pages: number;
  has_next: boolean;
  has_prev: boolean;
}

export interface EpisodeDetail {
  episode: Episode;
  characters: Character[];
  pagination: Pagination;
}

export interface LocationDetail {
  location: Location;
  characters: Character[];
  pagination: Pagination;
}

export interface SearchResult {
  characters: Character[];
  pagination: Pagination | null;
}
