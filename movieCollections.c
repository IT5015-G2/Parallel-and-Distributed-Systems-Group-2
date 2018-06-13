#include<stdio.h>
#include<strings.h>

//STRUCTURES
typedef struct movies{
	char title[60];
	int ratings;
	float income;
	float budget;
}mov;

typedef struct collections{
	mov movie[30];
	int cnt;
}collect;

//FUNCTIONS
void initialize(collect *A);
void display(collect A);

int main()
{
	collect A;
	
	initialize(&A);
	
	display(A);
	
	return 0;
}

//DO THE FORMAT!!
void display(collect A)
{
	int x;
	
	for(x = 0;x < A.cnt;x++){
		printf("\n TITLE: %s",A.movie[x].title);
		printf("\nRATINGS: %d",A.movie[x].ratings);
		printf("\nINCOME: %.2f",A.movie[x].income);
		printf("\nBUDGET: %.2f",A.movie[x].budget);
	}
}

void initialize(collect *A)
{
	A->cnt = 0;
	//INSERT CODE FOR AUTO GENERATE DATA INPUTS
}
