#include "matrix.h"


Matrix::Matrix(void)
{
	_entries.empty();
	_terms.empty();

	numDocs = 0;
}

Matrix::~Matrix(void)
{
	//Nope
}

void Matrix::add(int row, int col, int quantity)
{
	for(int i = 0; i < _entries.size(); i++)
	{
		if(_entries[i]._position._row == row && _entries[i]._position._col == col)
		{
			_entries[i]._value += quantity;
			return;
		}
	}
	_entry newEntry;
	newEntry._position._row = row;
	newEntry._position._col = col;
	newEntry._value = quantity;
	_entries.push_back(newEntry);

	if(numDocs < col) numDocs = col;
}

void Matrix::add(std::string term, int doc)
{
	for(int i = 0; i < _terms.size(); ++i)
	{
		if(_terms[i] == term)
		{
			this->add(i, doc, 1);
			return;
		}
	}
	_terms.push_back(term);
	this->add(_terms.size() - 1, doc, 1);
}

void Matrix::addDocument(std::string doc)
{
	char* str = (char*) doc.c_str();
	char* token;
	token = strtok(str, " ");
	while(token != NULL)
	{
		this->add(std::string(token), numDocs);
		token = strtok(NULL, " ");
	}
	++numDocs;
}

int Matrix::at(int row, int col)
{
	for(int i = 0; i < _entries.size(); i++)
	{
		if(_entries[i]._position._row == row && _entries[i]._position._col == col)
		{
			return _entries[i]._value;
		}
	}

	return 0;
}

void Matrix::sort(void)
{
	for(int i = 0; i < _entries.size(); i++)
	{
		int j = i;
		while(j > 0 && (_entries[j - 1]._position._row > _entries[j]._position._row ? true : _entries[j - 1]._position._col > _entries[j]._position._col))
		{
			std::swap(_entries[j - 1], _entries[j]);
			j--;
		}
	}
}

std::vector<int > Matrix::at(std::string term)
{
	std::vector<int > lol;

	int index = -1;
	for(int i = 0; i < _terms.size(); i++)
	{
		if(_terms[i] == term)
		{
			index = i;
		}
	}
	
	for(int i = 0; i < numDocs; i++)
	{
		lol.push_back(int(this->at(index, i)));
	}
	return lol;
}

std::vector<int > Matrix::operator[](std::string term)
{
	return this->at(term);
}

void Matrix::print(void)
{
	for(int i = 0; i < _entries.size(); i++)
	{
		printf("Pos: %d %d; Val: %d\n", _entries[i]._position._row, _entries[i]._position._col, _entries[i]._value);
	}
	for(int i = 0; i < _terms.size(); i++)
	{
		printf("%s ", _terms[i].c_str());
	}
	printf("\nMax rows: %d; Max cols: %d\n", _terms.size(), numDocs);
}