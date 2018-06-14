#include<stdio.h>
#include<conio.h>
#include<strings.h>

//STRUCTURES
typedef struct movies{
	char title[60];
	int ratings;
	int year;
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
void sortByYear(collect A);

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
		printf("\n YEAR: %d",A.movie[x].year);
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
void sortByYear(collect A){
		int i, j;
	mov movie;
	for (i = 0; i < 20; ++i) 
        {
 
            for (j = i + 1; j < 20; ++j)
            {
 
                if (A.movie[i].year > A.movie[j].year) 
                {
 
                    movie =  A.movie[i];
                    A.movie[i] = A.movie[j];
                    A.movie[j] = movie;
 
                }
 
            }
 
        }
        display(A);
	
}


