#include<stdio.h>
#include<conio.h>
#include<strings.h>

//STRUCTURES
typedef struct movies{
	char title[60];
	float ratings;
	int year;
//	float income;
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
void sortByTitleAscending(collect A);
void sortByTitleDescending(collect A);
void sortByRating(collect A,char choice);
void sortByBudget(collect A, int order);

int main()
{
	int option, n = 1;
	collect A;
	char order;
	
	initialize(&A);
	
	display(A);
	do{
	printf("\n\n~ Choose an option ~");
	printf("\n\n1 - Sort by Title");
	printf("\n2 - Sort by Ratings");
	printf("\n3 - Sort by Year");
	printf("\n4 - Sort by Budget");
	printf("\n5 - Exit");
	printf("\nEnter Choice:\n");
	scanf("%d",&option);
	 switch(option)
	 {
	 	case 1: printf("A - Ascending Order  D - Descending Order\n");
	 			fflush(stdin);
	 			scanf("%c",&order);
	 			switch(order){
	 				case 'A':
	 				case 'a':
	 					sortByTitleAscending(A); break;
	 				case 'D':
	 				case 'd':
	 					sortByTitleDescending(A); break;
	 				default: printf("\nChoice Not found!!!");
				 }
		 		break;
	 	case 2: printf("A: Ascending B: Descending\n");
	 			fflush(stdin);
	 			scanf("%c",&order);
		 		sortByRating(A,order);
		 		break;
	 	case 3: sortByYear(A);
	 			break;
	 	case 4: printf("(0) - Ascending Order  (1) - Descending Order\n");
	 			fflush(stdin);
	 			scanf("%d",&option);
		 		sortByBudget(A, option); break;
	 	case 5: n = 0;
	 			break;
	 	default:printf("Error! input is incorrect.");
	 }
	}while(n!=0);
	
	return 0;
}

//DO THE FORMAT!!
void display(collect A)
{
	int x;
	
	for(x = 0;x < A.cnt;x++){
		printf("\nTITLE: %s",A.movie[x].title);
		printf("\nYEAR: %d",A.movie[x].year);
		printf("\nRATINGS: %.1f",A.movie[x].ratings);
	//	printf("\nINCOME: %.2f",A.movie[x].income);
		printf("\nBUDGET: $%.2f",A.movie[x].budget);
		printf("\n");
	}
}

void initialize(collect *A)
{
	A->cnt = 0;
	int i = 0;
	mov temp[20] ={
		{"Captain America: The First Avenger", 6.9, 2011, 140000000},
		{"Iron Man", 7.9, 2008, 140000000},
		{"The Incredible Hulk", 6.8, 2008,150000000},
		{"Iron Man 2", 7, 2010, 200000000},
		{"Thor", 7, 2011, 150000000},
		{"The Avengers", 8.1, 2012, 220000000},
		{"Iron Man 3", 7.2, 2013, 200000000},
		{"Thor: The Dark World", 7, 2013, 152000000},
		{"Captain America: The Winter Soldier", 7.8, 2014, 170000000},
		{"Guardians of the Galaxy", 8.1, 2014, 200000000},
		{"Guardians of the Galaxy Vol. 2", 7.7, 2017, 200000000},
		{"Avengers: Age of Ultron", 7.4, 2015, 365000000},
		{"Ant-Man", 7.3, 2015, 130000000},
		{"Captain America: Civil War", 7.8, 2016, 250000000},
		{"Spider-Man: Homecoming", 7.5, 2017, 175000000},
		{"Doctor Strange", 7.5, 2016,165000000},
		{"Thor: Ragnarok", 7.9, 2017, 180000000},
		{"Black Panther", 7.5, 2018, 200000000},
		{"Avengers: Infinity War ", 8.8, 2018, 400000000},
		{"Fantastic Four", 4, 2015, 155000000}
		};
		
		for(i = 0; i < 20; i++){
			A->movie[i] = temp[i];
			A->cnt++;
		}
	
	
	//INSERT CODE FOR AUTO GENERATE DATA INPUTS
}

void sortByBudget(collect A, int order)
{
	int x,y;
	mov temp;
	if(order == 0){
		for(x=0;x < A.cnt;x++){
			for(y=0;y < A.cnt && A.movie[x].budget > A.movie[y].budget;y++){}
			while(y < x){
				if(A.movie[x].budget < A.movie[y].budget){
					temp = A.movie[y];
					A.movie[y] = A.movie[x];
					A.movie[x] = temp;
				}
				y++;
			}
		}
		display(A);
	}else if(order == 1){
			for(x=0;x < A.cnt;x++){
				for(y=0;y < A.cnt && A.movie[x].budget < A.movie[y].budget;y++){}
				while(y < x){
					if(A.movie[x].budget > A.movie[y].budget){
						temp = A.movie[y];
						A.movie[y] = A.movie[x];
						A.movie[x] = temp;
					}
					y++;
				}
			}
			display(A);
	}else{
		printf("\n\nValue entered is not in the list");
	}
}
void sortByYear(collect A){
		int i, j;
	mov movie;
	for (i = 0; i < A.cnt; ++i) 
        {
 
            for (j = i + 1; j < A.cnt; ++j)
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
void sortByTitleAscending(collect A){
		int i, j;
	mov movie;
	for (i = 0; i < A.cnt; ++i) 
        {
 
            for (j = i + 1; j < A.cnt; ++j)
            {
 
                if (strcmp(A.movie[i].title,A.movie[j].title)>0) 
                {
 
                    movie =  A.movie[i];
                    A.movie[i] = A.movie[j];
                    A.movie[j] = movie;
 
                }
 
            }
 
        }
        display(A);
	
}
void sortByTitleDescending(collect A){
		int i, j;
	mov movie;
	for (i = 0; i < A.cnt; ++i) 
        {
 
            for (j = i + 1; j < A.cnt; ++j)
            {
 
                if (strcmp(A.movie[i].title,A.movie[j].title)<0) 
                {
 
                    movie =  A.movie[i];
                    A.movie[i] = A.movie[j];
                    A.movie[j] = movie;
 
                }
 
            }
 
        }
        display(A);
	
}
void sortByRating(collect A,char order)
{
	mov movie;
	int i,j;
	switch(order){
		case 'A':
		case 'a':
			for( i=0 ; i<A.cnt ; i++){
				for( j=i+1 ; j<A.cnt ; j++){
					if(A.movie[i].ratings > A.movie[j].ratings){
						movie = A.movie[i];
						A.movie[i] = A.movie[j];
						A.movie[j] = movie;
					}
				}
			}
			system("cls");
			display(A);
			break;
		case 'B':
		case 'b':
			for( i=0 ; i<A.cnt ; i++){
				for( j=i+1 ; j < A.cnt ; j++){
					if(A.movie[i].ratings < A.movie[j].ratings){
						movie = A.movie[i];
						A.movie[i] = A.movie[j];
						A.movie[j] = movie;
					}
				}
			}
			system("cls");
			display(A);
			break;
		default:
			printf("\nEnter correct Order\n");
			break;
	}
	
}
