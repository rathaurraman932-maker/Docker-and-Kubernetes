using Microsoft.AspNetCore.Mvc.RazorPages;
using MySql.Data.MySqlClient;

public class IndexModel : PageModel
{
    private readonly IConfiguration _configuration;

    public IndexModel(IConfiguration configuration)
    {
        _configuration = configuration;
    }

    public List<Employee> Employees { get; set; } = new();

    public void OnGet()
    {
        string connectionString =
            _configuration.GetConnectionString("DefaultConnection")!;

        using MySqlConnection connection =
            new MySqlConnection(connectionString);

        connection.Open();

        string query = @"
            SELECT Employee_ID, Employee_Name, Phone
            FROM Employee_Information";

        using MySqlCommand command =
            new MySqlCommand(query, connection);

        using MySqlDataReader reader = command.ExecuteReader();

        while (reader.Read())
        {
            Employees.Add(new Employee
            {
                Employee_ID = reader.GetInt32("Employee_ID"),
                Employee_Name = reader.GetString("Employee_Name"),
                Phone = reader.GetString("Phone"),
                Photo = reader.GetString("Employee_Name").ToLower() switch
                {
                    "rahul" => "rahul.jpg",
                    "amit" => "amit.jpg",
                    "priya" => "priya.jpg",
                    _ => "default.jpg"
                }
            });
        }
    }
}

public class Employee
{
    public int Employee_ID { get; set; }
    public string Employee_Name { get; set; } = "";
    public string Phone { get; set; } = "";
    public string Photo { get; set; } = "";
}
