#ifndef __MATRIX_H_
#define __MATRIX_H_

#include <cstdio>
#include <cstring>
#include <string>
#include <algorithm>
#include <vector>

class Matrix
{
private:
	struct _entry
	{
		struct
		{
			int _row;
			int _col;
		} _position;
		
		int _value;
	};

	int numDocs;

	std::vector<_entry > _entries;
	std::vector<std::string > _terms;
public:
	Matrix(void);
	~Matrix(void);

	void add(std::string term, int doc);
	void addDocument(std::string doc);

	void sort(void);

	std::vector<int > at(std::string term);
	std::vector<int > operator[](std::string term);

	void print(void);//debug
private:
	void add(int row, int col, int quantity);
	int at(int row, int col);
};

#endif