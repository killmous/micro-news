#include <cstdio>
#include <string>
#include <fstream>

#include "matrix/matrix.h"

double sim(std::vector<int> one, std::vector<int> two)
{
	if(one.size() != two.size())
	{
		return -1;
	}

	double mag1 = 0;
	for(int i = 0; i < one.size(); i++)
	{
		mag1 += one[i]*one[i];
	}
	mag1 = sqrt(mag1);

	double mag2 = 0;
	for(int i = 0; i < two.size(); i++)
	{
		mag2 += two[i]*two[i];
	}
	mag2 = sqrt(mag2);

	double dot = 0;
	for(int i = 0; i < one.size(); i++)
	{
		dot += one[i]*two[i];
	}
	return dot/(mag1*mag2);
}

int main(int argc, char **argv)
{
	Matrix *mat = new Matrix();
	std::ifstream fstr((const char*) argv[1]);
	std::string line;

	printf("Reading...\n");
	while(fstr.good())
	{	
		getline(fstr, line);
		mat->addDocument(line);
	}
	printf("Read\n");
	printf("Sorting...\n");
	mat->sort();
	printf("Sorted\n");
	mat->print();
	printf("%f\n", sim(mat->at("stalin"), mat->at("hitler")));
	delete mat;
	return 1;
}